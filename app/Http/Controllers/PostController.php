<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', ['posts' => auth()->user()->posts]);
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
            'user_id' => auth()->user_idid(),
        ]);

        $post->save();

        return redirect()->route('posts.index');
    }
}

