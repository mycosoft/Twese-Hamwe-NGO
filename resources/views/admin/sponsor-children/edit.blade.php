@extends('adminlte::page')

@section('title', 'Edit Child')

@section('content_header')
    <h1>Edit Child: {{ $sponsorChild->name }}</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('admin.sponsor-children.update', $sponsorChild) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $sponsorChild->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth', $sponsorChild->date_of_birth?->format('Y-m-d')) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender', $sponsorChild->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $sponsorChild->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $sponsorChild->location) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="monthly_amount">Monthly Sponsorship Amount ($)</label>
                            <input type="number" step="0.01" name="monthly_amount" id="monthly_amount" class="form-control" value="{{ old('monthly_amount', $sponsorChild->monthly_amount) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="story">Story</label>
                    <textarea name="story" id="story" class="form-control" rows="4">{{ old('story', $sponsorChild->story) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="needs">Needs</label>
                    <textarea name="needs" id="needs" class="form-control" rows="3">{{ old('needs', $sponsorChild->needs) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Photo</label>
                            @if($sponsorChild->image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($sponsorChild->image) }}" alt="" class="img-thumbnail" style="max-width: 150px;">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="custom-control custom-switch mt-4">
                            <input type="hidden" name="is_sponsored" value="0">
                            <input type="checkbox" name="is_sponsored" id="is_sponsored" class="custom-control-input" value="1" {{ old('is_sponsored', $sponsorChild->is_sponsored) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_sponsored">Already Sponsored</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="custom-control custom-switch mt-4">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" id="is_active" class="custom-control-input" value="1" {{ old('is_active', $sponsorChild->is_active) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                    </div>
                </div>

                <div class="row" id="sponsor-info" style="{{ $sponsorChild->is_sponsored ? '' : 'display: none;' }}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sponsor_name">Sponsor Name</label>
                            <input type="text" name="sponsor_name" id="sponsor_name" class="form-control" value="{{ old('sponsor_name', $sponsorChild->sponsor_name) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sponsor_email">Sponsor Email</label>
                            <input type="email" name="sponsor_email" id="sponsor_email" class="form-control" value="{{ old('sponsor_email', $sponsorChild->sponsor_email) }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Child</button>
                <a href="{{ route('admin.sponsor-children.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@stop

@section('js')
<script>
    document.getElementById('is_sponsored').addEventListener('change', function() {
        document.getElementById('sponsor-info').style.display = this.checked ? 'flex' : 'none';
    });
</script>
@stop
