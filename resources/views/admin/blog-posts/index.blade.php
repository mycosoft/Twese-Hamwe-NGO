@extends('adminlte::page')

@section('title', 'Blog Posts')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Blog Posts</h1>
        <a href="{{ route('admin.blog-posts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Post
        </a>
    </div>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr>
                        <td>{{ Str::limit($post->title, 40) }}</td>
                        <td>{{ $post->category->name ?? 'Uncategorized' }}</td>
                        <td>{{ $post->user->name ?? 'Unknown' }}</td>
                        <td>
                            @if($post->is_published)
                                <span class="badge badge-success">Published</span>
                            @else
                                <span class="badge badge-warning">Draft</span>
                            @endif
                            @if($post->is_featured)
                                <span class="badge badge-info">Featured</span>
                            @endif
                        </td>
                        <td>{{ $post->views }}</td>
                        <td>
                            <a href="{{ route('admin.blog-posts.edit', $post) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.blog-posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No posts found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    </div>
@stop
