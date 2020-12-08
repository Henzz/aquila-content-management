@extends('layouts.app')

@section('content')
<title>Dashboard</title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <br>
                    {{ __('You are logged in') }} as <strong>{{ Auth::user()->name }}</strong>!
                </div>

                <div class="card-body">
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <hr>
                    <div class="text-center">
                        @if(count($posts) > 0)
                        <h4>Below Are Your Blog Posts</h4>
                        <div class=" table-responsive">
                            <table class="table table-hover table-dark">
                                <tr>
                                    <th>Img</th>
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach($posts as $post)
                                <tr>
                                    <td><img style="width: 70px;
                                        height: auto; border-radius:20px;" src="/storage/cover_images/{{$post->cover_image}}"></td>
                                    <td><a href="/posts/{{$post->id}}" class="btn btn-none" style="color: white;">{{ $post->title }}</a></td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        @else
                        <h3>You Have No Posts</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
