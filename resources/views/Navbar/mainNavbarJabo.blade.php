<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Website PKL') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark p-3" style="background-color: #145DA0; height:;">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homeuser.index') }}">Website PKL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('homeuser.index') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('homeuser.tambahdata') }}" class="nav-link">Input Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group" style="margin-left: 10px;">
                            <button class="btn btn-auto btn-sm" type="button" style="font-size: medium; color: white;">
                                Jabodetabek
                            </button>
                            <button type="button" class="btn btn-sm btn-auto dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('prrr.jogja') }}" style="color: black;">Yogyakarta</a></li>
                                <li><a class="dropdown-item" href="{{ route('batam') }}" style="color: black;">Batam</a></li>
                                <li><a class="dropdown-item" href="{{ route('pekanbaru') }}" style="color: black;">Pekan Baru</a></li>
                                <li><a class="dropdown-item" href="{{ route('padang') }}" style="color: black;">Padang</a></li>
                                <li><a class="dropdown-item" href="{{ route('jabodetabek') }}" style="color: black;">Jabodetabek</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group" style="margin-left: 10px;">
                            <button class="btn btn-auto btn-sm" type="button" style="font-size: medium; color: white;">
                                Jurusan
                            </button>
                            <button type="button" class="btn btn-sm btn-auto dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('rpl') }}" style="color: black;">Rekayasa Perangkat Lunak</a></li>
                                <li><a class="dropdown-item" href="{{ route('mm') }}" style="color: black;">Multimedia</a></li>
                                <li><a class="dropdown-item" href="{{ route('tkj') }}" style="color: black;">Teknik Komputer Jaringan</a></li>
                                <li><a class="dropdown-item" href="{{ route('bc') }}" style="color: black;">BroadCasting</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
