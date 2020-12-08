@extends('layouts.app')

@section('content')

    <title>Edit Post</title>
    <div class="card-body">
        <div class="container">
            <a href="/posts/{{$post->id}}" class="btn btn-secondary">Go Back</a>
            <h2>Edit Post</h2>
            {!! Form::open(['action' => ['App\Http\Controllers\PostsController@edit', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
					{!! Form::label('title', 'Title') !!}
					{!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
				</div>
                <div class='form-group'>
                    {!! Form::label('body', 'Body') !!}
                    {!! Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category', 'Category') !!}
                    <select name="category" id="category" class="form-control">
                        <option>{{ $post->category }}</option>
                        <option>Services Website Development</option>
                        <option>Services Mobile App Development</option>
                        <option>Services Hardware & Security</option>
                        <option>Service Digital Marketing and SEO</option>
                        <option>Service Enterprise System Development</option>
                        <option>Portfolio Website Development</option>
                        <option>Portfolio Mobile App Development</option>
                        <option>Portfolio Security System Supply and Installation</option>
                        <option>About Us</option>
                    </select>
                </div>
                <div class="form-group">
                    {!! Form::file('cover_image') !!}
                </div>
                <hr>
                {!! Form::hidden('_method', 'PUT') !!}
                {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}
                <hr>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
