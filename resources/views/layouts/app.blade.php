<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    RealEstate
                </a>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item {{ Request::is('residences*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('residences.index') }}">
                                    <i class="bi bi-house-door"></i> Residences
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('apartments*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('apartments.index') }}">
                                    <i class="bi bi-building"></i> Apartments
                                </a>
                            </li>
                            <!-- Your other navigation links -->
                            @can('is-admin')
                            <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('users.index') }}">
                                    <i class="bi bi-people"></i> List Commercial
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('users/create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('users.create') }}">
                                    <i class="bi bi-person-plus"></i> Create New Commercial
                                </a>
                            </li>
                            @endcan
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                        
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                </nav>
                
                

                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <!-- Your scripts, including Bootstrap and others -->
</body>
</html>
