@extends('adminlte::page')

@section('title', 'Gallery Albums')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Gallery Albums</h1>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Album
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
                        <th width="50">Order</th>
                        <th>Title</th>
                        <th>Images</th>
                        <th>Status</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($albums as $album)
                    <tr>
                        <td>{{ $album->order }}</td>
                        <td>
                            @if($album->cover_image)
                                <img src="{{ Storage::url($album->cover_image) }}" alt="" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                            @endif
                            {{ $album->title }}
                        </td>
                        <td>{{ $album->images_count }}</td>
                        <td>
                            @if($album->is_active)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.gallery.edit', $album) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.gallery.destroy', $album) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? All images in this album will be deleted.')">
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
                        <td colspan="5" class="text-center">No albums found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $albums->links() }}
        </div>
    </div>
@stop
