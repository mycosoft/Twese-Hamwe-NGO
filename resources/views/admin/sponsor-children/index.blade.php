@extends('adminlte::page')

@section('title', 'Sponsor Children')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Sponsor a Child</h1>
        <a href="{{ route('admin.sponsor-children.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Child
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
                        <th>Name</th>
                        <th>Age</th>
                        <th>Location</th>
                        <th>Monthly Amount</th>
                        <th>Status</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($children as $child)
                    <tr>
                        <td>
                            @if($child->image)
                                <img src="{{ Storage::url($child->image) }}" alt="" class="img-circle" style="width: 40px; height: 40px; object-fit: cover;">
                            @endif
                            {{ $child->name }}
                        </td>
                        <td>{{ $child->date_of_birth ? $child->date_of_birth->age . ' years' : 'N/A' }}</td>
                        <td>{{ $child->location }}</td>
                        <td>${{ number_format($child->monthly_amount, 2) }}</td>
                        <td>
                            @if($child->is_sponsored)
                                <span class="badge badge-success">Sponsored</span>
                            @else
                                <span class="badge badge-warning">Needs Sponsor</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.sponsor-children.edit', $child) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.sponsor-children.destroy', $child) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                        <td colspan="6" class="text-center">No children found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $children->links() }}
        </div>
    </div>
@stop
