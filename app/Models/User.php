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

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        // Add logic to retrieve and display the edit form
        // You can use a view or an API endpoint
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

        // Add any additional logic (e.g., updating tags) here

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        // Add logic to delete the post
        // You can also handle related data (e.g., comments) here

        $post->delete();

        return redirect()->route('posts.index');
    }
    public function comments()
{
    return $this->hasMany(Comment::class);
}

public function tags()
{
    return $this->hasMany(Tag::class);
}
}