<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PendingPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //
    public function __construct()
    {
       $this->middleware('auth')->except(['index', 'show']); 
    }

    public function index (Request $request)
    {
        if ($request->search) {
            $posts = Post::where('title', 'like', '%' . $request->search . '%')->orWhere('content', 'like', '%' . $request->search . '%')->latest()->paginate(4);
        }
        elseif ($request->category) {
            $posts = Category::where('name', $request->category)->firstOrFail()->posts()->paginate(4)->withQueryString();
        }
        else {
            $posts = Post::latest()->paginate(4);
        }
        $categories = Category::all();
        return view('blogPosts.blog', compact('posts', 'categories'));
    }

    public function myPosts (Request $request)
    {
        $userId = auth()->user()->id;
        $posts = Post::where('user_id', '=', $userId)->get();
        return view('blogPosts.my-posts', compact('posts'));
    }

    public function pending () {

        $pendingPosts = PendingPost::all();
        return view('blogPosts.pending-blog-post', compact('pendingPosts'));

    }
    public function create ()
    {
        $categories = Category::all();

        return view('blogPosts.create-blog-post', compact('categories'));
    }

    public function edit (Post $post)
    {
        if (auth()->user()->id !== $post->user->id)
        {
            abort(403);
        }
        return view('blogPosts.edit-blog-post', compact('post'));   
    }

    public function update (Request $request, Post $post)
    {
        if (auth()->user()->id !== $post->user->id)
        {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'content' => 'required'
        ]);


        $title = $request->input('title');
        $slug = Str::slug($title, '-') . '-' . $post->id;
        $content = $request->input('content');

        // file upload
        $imgPath = 'storage/' . $request->file('image')->store('postsImages', 'public');

        $post->title = $title;
        $post->slug = $slug;
        $post->content = $content;
        $post->imgPath = $imgPath;

        $post->save();

        return redirect()->back()->with('status', 'Post Edited Successfully');

    }

    public function store (Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        if (auth()->user()->role !== 'admin') {
            $post = new PendingPost();
            $postId = (PendingPost::latest()->first() !== null) ? PendingPost::latest()->first()->id + 1 : 1;
            $message = 'Post Waiting To Be Approved';
        }
        else {
            $post = new Post();
            $postId = (Post::latest()->first() !== null) ? Post::latest()->first()->id + 1 : 1;
            $message = 'Post Created Successfully';

        }

        $title = $request->input('title');
        $category_id = $request->input('category_id');
        $slug = Str::slug($title, '-') . '-' . $postId;
        $user_id = Auth::user()->id;
        $content = $request->input('content');

        // file upload
        $imgPath = 'storage/' . $request->file('image')->store('postsImages', 'public');

        // save
        $post->title = $title;
        $post->category_id = $category_id;
        $post->slug = $slug;
        $post->user_id = $user_id;
        $post->content = $content;
        $post->imgPath = $imgPath;

        $post->save();

        return redirect()->back()->with('status', $message);
    }

    public function show (Post $post)
    {
        $category = $post->category;

        $relatedPosts = $category->posts()->where('id', '!=', $post->id)->latest()->take(3)->get();
        
        return view('blogPosts.single-blog-post', compact('post', 'relatedPosts'));
    }
    public function showPendingPost (PendingPost $post)
    {
        $relatedPosts = null;
        return view('blogPosts.single-blog-post', compact('post', 'relatedPosts'));
    }
    public function destroy (Post $post)
    {
        $post->delete();

        return redirect()->back()->with('status', 'Post Deleted Successfully');

    }
    public function approve($id) 
    {
        $pendingPost = PendingPost::where('id', $id)->first();
        $post = new Post();
        $post->title = $pendingPost->title;
        $post->category_id = $pendingPost->category_id;
        $postId = (Post::latest()->first() !== null) ? Post::latest()->first()->id + 1 : 1;
        $post->slug = Str::slug($pendingPost->title, '-') . '-' . $postId;
        $post->user_id = $pendingPost->user_id;
        $post->content = $pendingPost->content;
        $post->imgPath = $pendingPost->imgPath;
        $post->save();

        $pendingPost->delete();

        return redirect()->back()->with('status', 'Post Approved Successfully');
    }
}
