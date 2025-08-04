@extends('layout')

@section('content')
<div class="container mt-4">
    <h5>Create New Post</h5>

    <!-- Show validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Blog post form -->
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Post Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Post Body</label>
            <textarea name="body" class="form-control" rows="5" placeholder="Enter content">{{ old('body') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Publish Post</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
