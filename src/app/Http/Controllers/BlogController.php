<?php

namespace App\Http\Controllers;

use App\Models\AppConst;
use App\Models\Category;
use App\Models\PendingPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->except(['index', 'show']); 
    }

    public function index(Request $request)
    {
        if ($request->search) {
            $posts = Post::where('title', 'like', '%' . $request->search . '%')->orWhere('content', 'like', '%' . $request->search . '%')->latest()->paginate(AppConst::POST_PER_PAGE);
        }
        elseif ($request->category) {
            $posts = Category::where('name', $request->category)->firstOrFail()->posts()->paginate(AppConst::POST_PER_PAGE)->withQueryString();
        }
        else {
            $posts = Post::latest()->paginate(AppConst::POST_PER_PAGE);
        }

        $categories = Category::all();

        return view('blogPosts.blog', compact('posts', 'categories'));
    }

    public function myPosts(Request $request)
    {
        $userId = auth()->user()->id;
        $posts = Post::where('user_id', '=', $userId)->get();
        return view('blogPosts.my-posts', compact('posts'));
    }

    public function pending() 
    {
        $pendingPosts = PendingPost::latest()->paginate(AppConst::POST_PER_PAGE);
        return view('blogPosts.pending-blog-post', compact('pendingPosts'));

    }

    public function create ()
    {
        $categories = Category::all();
        return view('blogPosts.create-blog-post', compact('categories'));
    }

    public function edit (Post $post)
    {
        return view('blogPosts.edit-blog-post', compact('post'));   
    }

    public function update (Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'content' => 'required'
        ]);

        $title = $request->input('title');
        $slug = Str::slug($title, '-') . '-' . $post->id;
        $content = $request->input('content');
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

        $postModel = (auth()->user()->role === 'admin') ? 'App\Models\Post' : 'App\Models\PendingPost';
        $post = new $postModel();
        $postId = ($postModel::latest()->first() !== null) ? $postModel::latest()->first()->id + 1 : 1;

        $title = $request->input('title');
        $category_id = $request->input('category_id');
        $slug = Str::slug($title, '-') . '-' . $postId;
        $user_id = Auth::user()->id;
        $content = $request->input('content');
        $imgPath = 'storage/' . $request->file('image')->store('postsImages', 'public');

        $post->title = $title;
        $post->category_id = $category_id;
        $post->slug = $slug;
        $post->user_id = $user_id;
        $post->content = $content;
        $post->imgPath = $imgPath;

        $post->save();

        return redirect()->back()->with('status', 'Post Created Successfully, Waiting To Be Approved');
    }

    public function show ($slug, $status = null)
    {
        if ($status === 'pending') {
            $relatedPosts = null;
            $post = PendingPost::where('slug', $slug)->first();
        }
        else {
            $post = Post::where('slug', $slug)->first();
            $category = $post->category;
            $relatedPosts = $category->posts()->where('id', '!=', $post->id)->latest()->take(AppConst::RELATED_POST)->get();
        }

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