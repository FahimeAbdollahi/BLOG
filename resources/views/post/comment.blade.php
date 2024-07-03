<!-- resources/views/comments.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Comments</h1>
    @foreach ($post->comments as $comment)
        <div class="comment">
            {{ $comment->content }}
        </div>
    @endforeach

    <!-- Form for adding new comment -->
    <form action="{{ route('comments.store', ['post' => $post]) }}" method="POST">
        @csrf
        <textarea name="content" placeholder="Add a comment"></textarea>
        <button type="submit">Submit</button>
    </form>
@endsection
