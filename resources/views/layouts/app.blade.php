<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    @guest
        {{-- @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif --}}
    @else
        <header class="navbar navbar-expand-md navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow align-items-stretch">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 py-2 text-center" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            {{-- <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> </button> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> --}}
            <div class="navbar-nav collapse navbar-collapse bg-white align-items-stretch" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto bg-dark align-items-center">
                    <!-- Authentication Links -->
                    @guest

                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                {{-- <div class="nav-item text-nowrap">
                        <a class="nav-link px-3" href="#">Sign out</a>
                    </div> --}}
            </div>
        </header>
    @endguest
    <div class="container-fluid">
        <div class="row">
            @guest
            @else
                
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse ">
                    <div class="position-sticky pt-3">
                        <ul class="nav sidebar-main-menu flex-column">
                            @if (Route::has('home'))
                                <li class="nav-item {{  (request()->is('home')) ? 'active' : '' }}">
                                    <a class="nav-link  " aria-current="page" href="{{ url('/home') }}">
                                        <span data-feather="home"></span>
                                        Dashboard
                                    </a>
                                </li>
                            @endif
                            @if (Route::has('invoice'))
                                <li class="nav-item  {{  (request()->is('invoice*')) ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ url('/invoice') }}">
                                        <span data-feather="invoice"></span>
                                        Invoice
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="remittance"></span>
                                    Remittance
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="sales"></span>
                                    Sales
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="commissions"></span>
                                    Commissions
                                </a>
                            </li>
                        </ul>
                       

                    </div>
                </nav>
            @endguest
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
    
</body>

</html>
