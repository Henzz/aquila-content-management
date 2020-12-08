@extends('layouts.app')

@section('content')

    <title>{{ $post->title }}</title>
    <div class="container">
        <a href="/posts" class="btn btn-secondary">Go Back</a>
    </div>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="width: 100%">
					<div class="container" style="width: 100% !important; height: 100% !important;">
						<br>
						<div class="card-header">
                            <h1 style="text-align: left">
                                {{$post->title}}
                                <img style="width:20%; height: auto; border-radius:5px; margin-left:5%;" src="/storage/cover_images/{{$post->cover_image}}">
                            </h1>
                        </div>
						<div class="card-body">
                            <div class="">{!!$post->body!!}</div>
                        </div>
                        <div class="card-footer">
                            <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                        </div>
                        <hr>
                        <br />
                    </div>
                    <br>
                    <div class="container">
                        @if(!Auth::guest())
                            @if(Auth::user()->id == $post->user_id)
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>
                                        </div>
                                        <div class="col">
                                            {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                                                <div class="form-group">
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger',]) !!}
                                                </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
