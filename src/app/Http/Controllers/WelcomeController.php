<?php

namespace App\Http\Controllers;

use App\Models\AppConst;
use Illuminate\Http\Request;
use App\Models\Post;

class WelcomeController extends Controller
{
    //
    public function index ()
    {
        $posts = Post::latest()->take(AppConst::POST_PER_PAGE)->get();
        return view('welcome', compact('posts'));
    }
}
