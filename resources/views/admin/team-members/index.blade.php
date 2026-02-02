@extends('adminlte::page')

@section('title', 'Team Members')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Team Members</h1>
        <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Member
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
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teamMembers as $member)
                    <tr>
                        <td>{{ $member->order }}</td>
                        <td>
                            @if($member->image)
                                <img src="{{ Storage::url($member->image) }}" alt="" class="img-circle" style="width: 40px; height: 40px; object-fit: cover;">
                            @endif
                            {{ $member->name }}
                        </td>
                        <td>{{ $member->position }}</td>
                        <td>{{ $member->email }}</td>
                        <td>
                            @if($member->is_active)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.team-members.edit', $member) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.team-members.destroy', $member) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                        <td colspan="6" class="text-center">No team members found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $teamMembers->links() }}
        </div>
    </div>
@stop
