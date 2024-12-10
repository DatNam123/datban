<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->simplePaginate(3);
        // dd($posts);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>  'required|unique:posts',
            'image' => 'required|image',
            'body' => 'required'
        ]);
        $image = $request->file('image')->store('public/posts');
        $user_id = Auth::user()->id;
        Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'is_published' => $request->is_published == 'on' ? 1 : 0,
            'user_id' => $user_id,
            'image' => $image
        ]);

        return to_route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $image = $post->image;
        if ($request->hasFile('image')) {
            Storage::delete($post->image);
            $image = $request->file('image')->store('public/posts');
        }
        $post->update([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'user_id' => $user_id,
            'is_published' => $request->is_published == 'on' ? 1 : 0,
            'image' => $image
        ]);
        return to_route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->image);
        $post->delete();
        return to_route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
