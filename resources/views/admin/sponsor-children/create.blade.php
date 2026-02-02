@extends('adminlte::page')

@section('title', 'Add Child')

@section('content_header')
    <h1>Add Child for Sponsorship</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('admin.sponsor-children.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="monthly_amount">Monthly Sponsorship Amount ($)</label>
                            <input type="number" step="0.01" name="monthly_amount" id="monthly_amount" class="form-control" value="{{ old('monthly_amount', 50) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="story">Story</label>
                    <textarea name="story" id="story" class="form-control" rows="4">{{ old('story') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="needs">Needs</label>
                    <textarea name="needs" id="needs" class="form-control" rows="3">{{ old('needs') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Photo</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="custom-control custom-switch mt-4">
                            <input type="hidden" name="is_sponsored" value="0">
                            <input type="checkbox" name="is_sponsored" id="is_sponsored" class="custom-control-input" value="1" {{ old('is_sponsored') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_sponsored">Already Sponsored</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="custom-control custom-switch mt-4">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" id="is_active" class="custom-control-input" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                    </div>
                </div>

                <div class="row" id="sponsor-info" style="display: none;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sponsor_name">Sponsor Name</label>
                            <input type="text" name="sponsor_name" id="sponsor_name" class="form-control" value="{{ old('sponsor_name') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sponsor_email">Sponsor Email</label>
                            <input type="email" name="sponsor_email" id="sponsor_email" class="form-control" value="{{ old('sponsor_email') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Child</button>
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
    if(document.getElementById('is_sponsored').checked) {
        document.getElementById('sponsor-info').style.display = 'flex';
    }
</script>
@stop
