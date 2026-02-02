@extends('adminlte::page')

@section('title', 'Edit Album')

@section('content_header')
    <h1>Edit Album: {{ $gallery->title }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Album Details</h3>
                </div>
                <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $gallery->title) }}" required>
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $gallery->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="cover_image">Cover Image</label>
                            @if($gallery->cover_image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($gallery->cover_image) }}" alt="" class="img-thumbnail" style="max-width: 150px;">
                                </div>
                            @endif
                            <input type="file" name="cover_image" id="cover_image" class="form-control-file">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="order">Order</label>
                                    <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $gallery->order) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-switch mt-4">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" id="is_active" class="custom-control-input" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="is_active">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Album</button>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Upload Images</h3>
                </div>
                <form action="{{ route('admin.gallery.upload-images', $gallery) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="images">Select Images (Multiple)</label>
                            <input type="file" name="images[]" id="images" class="form-control-file" multiple accept="image/*">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Upload Images</button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Album Images ({{ $gallery->images->count() }})</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($gallery->images as $image)
                        <div class="col-md-4 mb-3">
                            <div class="position-relative">
                                <img src="{{ Storage::url($image->image) }}" alt="" class="img-thumbnail w-100" style="height: 120px; object-fit: cover;">
                                <form action="{{ route('admin.gallery.delete-image', $image) }}" method="POST" class="position-absolute" style="top: 5px; right: 5px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this image?')">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center text-muted">
                            No images uploaded yet
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
