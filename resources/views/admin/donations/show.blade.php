@extends('adminlte::page')

@section('title', 'Donation Details')

@section('content_header')
    <h1>Donation Details</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Donation Information</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Donor Name</th>
                            <td>{{ $donation->is_anonymous ? 'Anonymous' : $donation->donor_name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $donation->donor_email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $donation->donor_phone ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $donation->donor_address ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td><strong>${{ number_format($donation->amount, 2) }} {{ $donation->currency }}</strong></td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{ ucfirst(str_replace('_', ' ', $donation->type)) }}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{ $donation->payment_method ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Transaction ID</th>
                            <td>{{ $donation->transaction_id ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Project</th>
                            <td>{{ $donation->project->title ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Sponsored Child</th>
                            <td>{{ $donation->sponsorChild->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Message</th>
                            <td>{{ $donation->message ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ $donation->created_at->format('M d, Y H:i:s') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Status</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.donations.update-status', $donation) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Current Status</label>
                            <p>
                                <span class="badge badge-{{ $donation->status == 'completed' ? 'success' : ($donation->status == 'pending' ? 'warning' : ($donation->status == 'failed' ? 'danger' : 'secondary')) }}" style="font-size: 1rem;">
                                    {{ ucfirst($donation->status) }}
                                </span>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="status">Change Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending" {{ $donation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ $donation->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="failed" {{ $donation->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                <option value="refunded" {{ $donation->status == 'refunded' ? 'selected' : '' }}>Refunded</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update Status</button>
                    </form>
                </div>
            </div>
            <a href="{{ route('admin.donations.index') }}" class="btn btn-secondary btn-block">Back to List</a>
        </div>
    </div>
@stop
