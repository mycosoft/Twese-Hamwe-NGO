@extends('adminlte::page')

@section('title', 'Edit Blog Post')

@section('content_header')
    <h1>Edit Post: {{ Str::limit($blogPost->title, 40) }}</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('admin.blog-posts.update', $blogPost) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $blogPost->title) }}" required>
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="blog_category_id">Category</label>
                            <select name="blog_category_id" id="blog_category_id" class="form-control">
                                <option value="">Uncategorized</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('blog_category_id', $blogPost->blog_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" class="form-control" rows="3">{{ old('excerpt', $blogPost->excerpt) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="content">Content <span class="text-danger">*</span></label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="10" required>{{ old('content', $blogPost->content) }}</textarea>
                    @error('content')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Featured Image</label>
                            @if($blogPost->image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($blogPost->image) }}" alt="" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="custom-control custom-switch mt-4">
                            <input type="hidden" name="is_published" value="0">
                            <input type="checkbox" name="is_published" id="is_published" class="custom-control-input" value="1" {{ old('is_published', $blogPost->is_published) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_published">Published</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="custom-control custom-switch mt-4">
                            <input type="hidden" name="is_featured" value="0">
                            <input type="checkbox" name="is_featured" id="is_featured" class="custom-control-input" value="1" {{ old('is_featured', $blogPost->is_featured) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_featured">Featured</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Post</button>
                <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@stop
