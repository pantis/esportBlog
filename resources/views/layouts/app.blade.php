<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <img class="navbar-brand logo" src={{asset('img/lollogo.png')}} alt="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{-- Left Side Of Navbar --}}
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">{{ __('Domov') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('guides') }}">{{ __('Prirucky') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('gallery') }}">{{ __('Galeria') }}</a>
                    </li>
                </ul>
                {{-- Right Side Of Navbar  --}}
                <ul class="navbar-nav ml-auto">
                    @can('viewAny', \App\Models\User::class)
                        <li class="nav-item">
                            @auth
                                <a class="nav-link" href="{{ route('user.index') }}">{{ __('Users') }}</a>
                            @endauth
                        </li>
                    @endcan
                    <li class="nav-item">
                        @auth
                            <a class="nav-link" href="{{ route('articles') }}">{{ __('Articles') }}</a>
                        @endauth
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
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

    <main class="pb-4">
        @yield('content')
    </main>

    <footer>
        Patrik Mydlar
    </footer>
</div>
</body>
</html>
