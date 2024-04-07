<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

         <title>@yield('title', 'Admin') | COHAS Bepanda</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
@php
$favicon = \App\Models\Logo::first()->favicon;
@endphp

    <meta content="College of Hopes, Arts and Sciences Admin Dashboard" name="description" />
    <meta content="Creativeitem" name="author" />
    <!-- App favicon -->    
    <link rel="shortcut icon" href="{{ asset('storage/app/public/logos/' . $favicon) }}">

<!-- App css -->
<link href="/public/assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="/public/assets/backend/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style" />
<link href="/public/assets/backend/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
<!-- App css End-->

<!-- third party css -->
<link href="/public/assets/backend/css/vendor/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="/public/assets/backend/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="/public/assets/backend/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="/public/assets/backend/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="/public/assets/backend/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="/public/assets/backend/css/vendor/summernote-bs4.css" rel="stylesheet" type="text/css" />
<!-- third party css end -->


<link href="/public/assets/backend/css/custom.css" rel="stylesheet" type="text/css" />
<link href="/public/assets/backend/css/content-placeholder.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="/public/assets/backend/js/jquery-3.6.0.min.js"></script>
</head>
{{--<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
            </div>
        </nav>--}}
<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": false}'>
 @yield('header')
<div class="container-fluid">
        <div class="wrapper">
 @yield('navigation')

<div class="content-page">
                <div class="content" style="padding-top: 30px;">
                    <div class="loadings hidden"></div>
         @yield('content')

                     </div>
 @yield('footer')
 </div>
            <!-- END CONTENT -->
        </div>
    </div>
   
</body>
</html>
           
    
           
           

       