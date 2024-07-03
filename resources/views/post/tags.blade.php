<!-- resources/views/tags.blade.php -->

@extends('layouts.app') 

@section('content')
    <h1>Tags</h1>
    @foreach ($post->tags as $tag)
        <div class="tag">
            {{ $tag->name }}
        </div>
    @endforeach

    <!-- Form for adding new tag -->
    <form action="{{ route('tags.store', ['post' => $post]) }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter a tag">
        <button type="submit">Add Tag</button>
    </form>
@endsection
