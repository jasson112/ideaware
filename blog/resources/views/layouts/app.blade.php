<!DOCTYPE html>
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
    <div class="is-fullwidth">
        <nav class="navbar" role="navigation" aria-label="dropdown navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div id="navMenu" class="navbar-menu">
                    @auth
                        <div class="navbar-start">
                            <a class="navbar-item" href="{{ route('posts.index') }}">
                                Posts
                            </a>
                            <a class="navbar-item" href="{{ route('tags.index') }}">
                                Tags
                            </a>
                            <a class="navbar-item" href="{{ route('users.index') }}">
                                Users
                            </a>
                        </div>
                    @endauth
                    <div class="navbar-end">
                        <div class="navbar-item has-dropdown is-hoverable">
                            @guest
                                <div class="buttons">
                                    <a class="button is-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    @if (Route::has('register'))
                                        <a class="button is-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                </div>
                            @else
                                <a class="navbar-link">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="navbar-dropdown is-right">
                                    <a class="navbar-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
</body>
</html>
