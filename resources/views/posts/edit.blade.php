@extends('layout')

@section('content')
<div class="container mt-4">
    <h5>Edit Post</h5>

    <!-- Validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the errors below.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit form -->
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Post Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Post Body</label>
            <textarea name="body" class="form-control" rows="5">{{ old('body', $post->body) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
