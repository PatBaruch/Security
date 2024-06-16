@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Post') }}</div>

                <div class="card-body">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->body }}</p>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
