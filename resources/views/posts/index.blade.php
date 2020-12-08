@extends('layouts.app')

@section('content')

    <title>List of Posts</title>
    <div class="container">
        <h2>Posts</h2>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width: 50%;
                            height: auto; border-radius:5px;" src="/storage/cover_images/{{ $post->cover_image }}">
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <br>
                            <h3><a href="/posts/{{ $post->id }}" style="text-decoration: none;">{{ $post->title }}</a></h3>
                            <small>Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $posts->links('pagination::bootstrap-4') }}
        @else
            <p>No Posts Found Yet</p>
        @endif
    </div>

@endsection
