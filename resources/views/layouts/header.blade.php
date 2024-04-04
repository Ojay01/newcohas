<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>@yield('title', ' Home') | COHAS Bepanda</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

   <!-- Google Fonts -->
<link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- CSS Implementing Plugins -->
<link rel="stylesheet" href="/public/assets/frontend/ultimate/vendor/font-awesome/css/fontawesome-all.min.css">
<link rel="stylesheet" href="/public/assets/frontend/ultimate/vendor/animate.css/animate.min.css">
<link rel="stylesheet" href="/public/assets/frontend/ultimate/vendor/hs-megamenu/src/hs.megamenu.css">
<link rel="stylesheet" href="/public/assets/frontend/ultimate/vendor/fancybox/jquery.fancybox.css">
<link rel="stylesheet" href="/public/assets/frontend/ultimate/vendor/slick-carousel/slick/slick.css">
<link rel="stylesheet" href="/public/assets/frontend/ultimate/vendor/cubeportfolio/css/cubeportfolio.min.css">

<!-- CSS Front Template -->
<link rel="stylesheet" href="/public/assets/frontend/ultimate/css/theme.css">
<link rel="stylesheet" href="/public/assets/toastr/toastr.min.css">
<link rel="stylesheet" href="/public/assets/frontend/ultimate/css/custom.css">

<script src="/public/assets/frontend/ultimate/vendor/jquery/dist/jquery.min.js"></script>

<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="College of Hopes, Arts and Sciences Official Website" name="description" />
    <meta content="Amene Academy" name="author" />
    <!-- App favicon -->
<link rel="shortcut icon" href="#">

</head>


<!-- ========== HEADER ========== -->
<header id="header" class="u-header u-header--bg-transparent u-header--white-nav-links-md u-header--sub-menu-dark-bg-md u-header--abs-top"
data-header-fix-moment="500"
data-header-fix-effect="slide">
<div class="u-header__section">
  <div id="logoAndNav" class="container">
    <!-- Nav -->
    <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
      <div class="u-header-center-aligned-nav__col">
        <!-- Logo -->
        <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center u-header__navbar-brand-text-white" href="/">
          <img src="{{ asset('storage/app/public/logos/' . $sliderSettings->header_logo) }}"
          style="height:35px;" />
        </a>
        <!-- End Logo -->

        <!-- Responsive Toggle Button -->
        <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--white"
        aria-label="Toggle navigation"
        aria-expanded="false"
        aria-controls="navBar"
        data-toggle="collapse"
        data-target="#navBar">
        <span id="hamburgerTrigger" class="u-hamburger__box">
          <span class="u-hamburger__inner"></span>
        </span>
      </button>
      <!-- End Responsive Toggle Button -->
    </div>

    <!-- Navigation -->
    <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
      <ul class="navbar-nav u-header__navbar-nav">
    <li class="nav-item u-header__nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link u-header__nav-link" href="/">Home</a>
    </li>
    <li class="nav-item u-header__nav-item {{ Request::is('noticeboard') ? 'active' : '' }}">
        <a class="nav-link u-header__nav-link" href="{{ route('noticeboard') }}">Noticeboard</a>
    </li>
    <li class="nav-item u-header__nav-item {{ Request::is('events') ? 'active' : '' }}">
        <a class="nav-link u-header__nav-link" href="{{ route('events') }}">Events</a>
    </li>
    <li class="nav-item u-header__nav-item {{ Request::is('teachers') ? 'active' : '' }}">
        <a class="nav-link u-header__nav-link" href="{{ route('teachers') }}">Teachers</a>
    </li>
    <li class="nav-item u-header__nav-item {{ Request::is('gallery') ? 'active' : '' }}">
        <a class="nav-link u-header__nav-link" href="{{ route('gallery') }}">Gallery</a>
    </li>
    <li class="nav-item u-header__nav-item {{ Request::is('contact') ? 'active' : '' }}">
        <a class="nav-link u-header__nav-link" href="{{ route('contact') }}">Contact</a>
    </li>
    <li class="nav-item u-header__nav-item {{ Request::is('admission') ? 'active' : '' }}">
        <a class="nav-link u-header__nav-link btn-primary text-white text-center font-weight-bold btn-sm py-2 px-3" href="{{ route('admission') }}">Online Admission</a>
    </li>
</ul>

    </div>
    <!-- End Navigation -->

  </nav>
  <!-- End Nav -->
</div>
</div>
</header>
<!-- ========== END HEADER ========== -->

 @yield('content')

  @yield('footer')
