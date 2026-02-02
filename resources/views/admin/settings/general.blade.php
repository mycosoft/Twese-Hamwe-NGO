@extends('adminlte::page')

@section('title', 'General Settings')

@section('content_header')
    <h1>General Settings</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <form action="{{ route('admin.settings.general.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_name">Site Name</label>
                            <input type="text" name="site_name" id="site_name" class="form-control" value="{{ $settings['site_name'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_tagline">Tagline</label>
                            <input type="text" name="site_tagline" id="site_tagline" class="form-control" value="{{ $settings['site_tagline'] ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_email">Email</label>
                            <input type="email" name="site_email" id="site_email" class="form-control" value="{{ $settings['site_email'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_phone">Phone</label>
                            <input type="text" name="site_phone" id="site_phone" class="form-control" value="{{ $settings['site_phone'] ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="site_address">Address</label>
                    <textarea name="site_address" id="site_address" class="form-control" rows="3">{{ $settings['site_address'] ?? '' }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_logo">Logo</label>
                            @if(!empty($settings['site_logo']))
                                <div class="mb-2">
                                    <img src="{{ Storage::url($settings['site_logo']) }}" alt="" class="img-thumbnail" style="max-height: 80px;">
                                </div>
                            @endif
                            <input type="file" name="site_logo" id="site_logo" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_favicon">Favicon</label>
                            @if(!empty($settings['site_favicon']))
                                <div class="mb-2">
                                    <img src="{{ Storage::url($settings['site_favicon']) }}" alt="" class="img-thumbnail" style="max-height: 40px;">
                                </div>
                            @endif
                            <input type="file" name="site_favicon" id="site_favicon" class="form-control-file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Settings</button>
            </div>
        </form>
    </div>
@stop
