@extends('adminlte::page')

@section('title', 'Donations')

@section('content_header')
    <h1>Donations</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <form action="{{ route('admin.donations.index') }}" method="GET" class="form-inline">
                <select name="status" class="form-control mr-2">
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                    <option value="refunded" {{ request('status') == 'refunded' ? 'selected' : '' }}>Refunded</option>
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Donor</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Project/Child</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($donations as $donation)
                    <tr>
                        <td>
                            @if($donation->is_anonymous)
                                <em>Anonymous</em>
                            @else
                                {{ $donation->donor_name }}<br>
                                <small class="text-muted">{{ $donation->donor_email }}</small>
                            @endif
                        </td>
                        <td>${{ number_format($donation->amount, 2) }} {{ $donation->currency }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $donation->type)) }}</td>
                        <td>
                            @if($donation->project)
                                <span class="badge badge-info">Project</span> {{ $donation->project->title }}
                            @elseif($donation->sponsorChild)
                                <span class="badge badge-warning">Child</span> {{ $donation->sponsorChild->name }}
                            @else
                                General Donation
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-{{ $donation->status == 'completed' ? 'success' : ($donation->status == 'pending' ? 'warning' : ($donation->status == 'failed' ? 'danger' : 'secondary')) }}">
                                {{ ucfirst($donation->status) }}
                            </span>
                        </td>
                        <td>{{ $donation->created_at->format('M d, Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.donations.show', $donation) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.donations.destroy', $donation) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                        <td colspan="7" class="text-center">No donations found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $donations->links() }}
        </div>
    </div>
@stop
