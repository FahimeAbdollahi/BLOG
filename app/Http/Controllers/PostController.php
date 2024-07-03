<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('post.index', ['posts' => auth()->user()->posts]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $post = new Post([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => auth()->user()->id,
        ]);

        $post->save();
        $tags = $request->input('tags'); 
        $post->tags()->sync($tags); // Sync tags with the post

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        $tags = $request->input('tags'); 
        $post->tags()->sync($tags); // Sync updated tags with the post

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        // Delete the post
        $post->delete();
        $post->comments()->delete(); // Delete associated comments

        return redirect()->route('posts.index');
    }
}
