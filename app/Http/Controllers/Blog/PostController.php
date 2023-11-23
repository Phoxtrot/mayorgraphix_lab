<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index() : View {
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('Post.index',compact('posts'));
    }
}
