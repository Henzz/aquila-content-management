<style>
    #logo {
        position: relative;
        margin: 0 auto;
    }
    #logo img{
        height: 70px;
        width: auto;
        vertical-align: top ;
    }

</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <!-- Logo============================================= -->
    <div id="logo">
        <a href="/" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="Logo"></a>
    </div>
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Aquila') }}
        </a>
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="/posts">Posts</a></li>
        </ul>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <!-- Right Side Of Navbar -->
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/dashboard">Dashboard</a>
                        <a class="dropdown-item" href="/posts/create">Create Post</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
