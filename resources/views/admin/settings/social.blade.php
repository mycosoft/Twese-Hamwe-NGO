@extends('adminlte::page')

@section('title', 'Social Media Settings')

@section('content_header')
    <h1>Social Media Settings</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <form action="{{ route('admin.settings.social.update') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="facebook_url"><i class="fab fa-facebook"></i> Facebook URL</label>
                    <input type="url" name="facebook_url" id="facebook_url" class="form-control" value="{{ $settings['facebook_url'] ?? '' }}" placeholder="https://facebook.com/yourpage">
                </div>

                <div class="form-group">
                    <label for="twitter_url"><i class="fab fa-twitter"></i> Twitter URL</label>
                    <input type="url" name="twitter_url" id="twitter_url" class="form-control" value="{{ $settings['twitter_url'] ?? '' }}" placeholder="https://twitter.com/yourhandle">
                </div>

                <div class="form-group">
                    <label for="instagram_url"><i class="fab fa-instagram"></i> Instagram URL</label>
                    <input type="url" name="instagram_url" id="instagram_url" class="form-control" value="{{ $settings['instagram_url'] ?? '' }}" placeholder="https://instagram.com/yourhandle">
                </div>

                <div class="form-group">
                    <label for="linkedin_url"><i class="fab fa-linkedin"></i> LinkedIn URL</label>
                    <input type="url" name="linkedin_url" id="linkedin_url" class="form-control" value="{{ $settings['linkedin_url'] ?? '' }}" placeholder="https://linkedin.com/company/yourcompany">
                </div>

                <div class="form-group">
                    <label for="youtube_url"><i class="fab fa-youtube"></i> YouTube URL</label>
                    <input type="url" name="youtube_url" id="youtube_url" class="form-control" value="{{ $settings['youtube_url'] ?? '' }}" placeholder="https://youtube.com/yourchannel">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Settings</button>
            </div>
        </form>
    </div>
@stop
