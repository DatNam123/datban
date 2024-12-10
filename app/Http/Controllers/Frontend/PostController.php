<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', 1)->orderBy('created_at', 'desc')->simplePaginate(3);
        return view('blogs.index', compact('posts'));
    }
    public function show(Post $post)
    {
        $post_id = $post->id;
        $posts = Post::where('is_published', 1)
            ->where('id', '<>', $post_id)
            ->inRandomOrder()->take(4)->get();
        return view('blogs.show', compact('post', 'posts'));
    }
}
