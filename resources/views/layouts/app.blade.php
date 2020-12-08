<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: ">
    <div id="app">
        @include('inc.navbar')
        <main class="py-4 container">
            @include('inc.messages')
            @yield('content')
        </main>
    </div>

    <!-- Script for ckeditor -->
    <script src="/ckeditor/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'article-ckeditor',{
			height: 500,
			filebrowserUploadUrl:"{{route('upload', ['_token'=>csrf_token() ])}}",
			filebrowserUploadMethod:"form",
			allowedContent : true,
			fullPage : false
		});
	</script>
</body>
</html>
