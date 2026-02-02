@extends('adminlte::page')

@section('title', 'Programs')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Programs</h1>
        <a href="{{ route('admin.programs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Program
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
                        <th>Status</th>
                        <th>Projects</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programs as $program)
                    <tr>
                        <td>{{ $program->order }}</td>
                        <td>
                            @if($program->image)
                                <img src="{{ Storage::url($program->image) }}" alt="" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                            @endif
                            {{ $program->title }}
                        </td>
                        <td>
                            @if($program->is_active)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $program->projects_count ?? $program->projects->count() }}</td>
                        <td>
                            <a href="{{ route('admin.programs.edit', $program) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                        <td colspan="5" class="text-center">No programs found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $programs->links() }}
        </div>
    </div>
@stop
