@extends('layout')

@section('content')
<div class="container mt-4">
    <h5>Blog Posts</h5>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <table class="table table-responsive">
                        <tr> <td><h4>{{ $post->title }}</h4></td> </tr>
                        <tr>
                            <td class="float-left"><p>{{ Str::limit($post->body, 150) }}</p></td>
                        </tr>
                        <tr>
                            <td class="float-right"><a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">View</a> | <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a> | <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                </form></td>
                        </tr>
                    </table>
                </div>
            </div>
        @endforeach

    {{ $posts->links('pagination::bootstrap-4') }}
</div>
@endsection