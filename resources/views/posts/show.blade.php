@extends('layout')

@section('content')
<div class="container mt-4">
    <h5>{{ $post->title }}</h5>
    <p class="text-muted">Published at: {{ $post->created_at->format('M d, Y') }}</p>

    <div class="mb-4">
        {!! nl2br(e($post->body)) !!}
    </div>

    <a href="{{ route('posts.index') }}" class="btn btn-outline-primary">Back to Posts</a>
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>

    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block" >
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
    </form>
</div>
@endsection
