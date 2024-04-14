@section('header')
@php
$lightlogo = \App\Models\Logo::first()->light_logo;
$smalllogo = \App\Models\Logo::first()->small_logo;
$title = \App\Models\Setting::first()->system_title;
@endphp
<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="/" class="topnav-logo" style="min-width: unset;">
            <span class="topnav-logo-lg">
                <img src="{{ asset('storage/app/public/logos/' . $lightlogo) }}" alt="" height="40">
            </span>
            <span class="topnav-logo-sm">
                <img src="{{ asset('storage/app/public/logos/' . $smalllogo) }}" alt="" height="40">
            </span>
        </a>

        <ul class="list-unstyled topbar-menu float-end mb-0">


            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="account-user-avatar">
                        @if(Auth::user()->profile_image)
                        <img src="{{ asset('storage/app/public/profiles/' . Auth::user()->profile_image) }}" alt="user-image" class="rounded-circle">
                        @else
                        <img src="/public/images/placeholder.jpg" alt="user-image" class="rounded-circle">
                        @endif
                    </span>
                    <span>
                        <span class="account-user-name">{{ Auth::user()->name }}</span>
                        <span class="account-position text-uppercase">{{ Auth::user()->role }}</span>

                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{route('teacher.profile')}}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>My account</span>
                    </a>
                    <!-- item-->


                    <!-- item-->
                    <a href="{{route('logout')}}" class="dropdown-item notify-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>
        <div class="app-search dropdown pt-1 mt-2">
            <h4 style="color: #fff; float: left;" class="d-none d-md-inline-block"> {{$title}}</h4>
            <a href="/" target="_blank" class="btn btn-outline-light ms-2 d-none d-md-inline-block">Visit website</a>
        </div>
        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
    </div>
</div>
<!-- end Topbar -->
<script>
    // Check if the session has a success message
    @if(session('success'))
    $(function() {
        // Create the success message HTML structure
        var successMessage = '<div class="jq-toast-wrap top-right"><div class="jq-toast-single jq-has-icon jq-icon-success" style="text-align: left; display: none;"><span class="jq-toast-loader jq-toast-loaded" style="background-color: rgba(0,0,0,0.2);"></span><span class="close-jq-toast-single">×</span><h2 class="jq-toast-heading">Success !</h2>{{ session('
        success ') }}</div></div>';

        // Append the success message to the body of the document
        $('body').append(successMessage);

        // Slide down the success message and fade it in
        $('.jq-toast-wrap .jq-toast-single').slideDown().fadeIn();

        // Set a timeout function to remove the success message after 5 seconds
        setTimeout(function() {
            $('.jq-toast-wrap').fadeOut(function() {
                $(this).remove();
            });
        }, 5000); // 5000 milliseconds = 5 seconds

        // Handle click event on the close button
        $('.close-jq-toast-single').click(function() {
            // Fade out and remove the success message when close button is clicked
            $('.jq-toast-wrap').fadeOut(function() {
                $(this).remove();
            });
        });
    });
    @endif
</script>

<script>
    // Check if the session has an error message
    @if(session('error'))
    $(function() {
        // Create the error message HTML structure
        var errorMessage = '<div class="jq-toast-wrap top-right"><div class="jq-toast-single jq-has-icon jq-icon-error" style="text-align: left; display: none;"><span class="jq-toast-loader jq-toast-loaded" style="background-color: rgba(0,0,0,0.2);"></span><span class="close-jq-toast-single">×</span><h2 class="jq-toast-heading">Error !</h2>{{ session('
        error ') }}</div></div>';

        // Append the error message to the body of the document
        $('body').append(errorMessage);

        // Slide down the error message and fade it in
        $('.jq-toast-wrap .jq-toast-single').slideDown().fadeIn();

        // Set a timeout function to remove the error message after 5 seconds
        setTimeout(function() {
            $('.jq-toast-wrap').fadeOut(function() {
                $(this).remove();
            });
        }, 5000); // 5000 milliseconds = 5 seconds

        // Handle click event on the close button
        $('.close-jq-toast-single').click(function() {
            // Fade out and remove the error message when close button is clicked
            $('.jq-toast-wrap').fadeOut(function() {
                $(this).remove();
            });
        });
    });
    @endif
</script>

<script>
    $(function() {
        // Check if there is an error message in the DOM
        var errorMessage = $('.error-message');

        if (errorMessage.length) {
            // If error message exists, show it
            $('.jq-toast-wrap').fadeIn();

            // Set a timeout to hide the error message after 5 seconds
            setTimeout(function() {
                $('.jq-toast-wrap').fadeOut();
            }, 5000); // 5000 milliseconds = 5 seconds

            // Handle click event on the close button
            $('.close-jq-toast-single').click(function() {
                $('.jq-toast-wrap').fadeOut();
            });
        }
    });
</script>

<!-- Error message -->
@if($errors->any())
<div class="jq-toast-wrap top-right" style="display: none;">
    <div class="jq-toast-single jq-has-icon jq-icon-error">
        <span class="jq-toast-loader jq-toast-loaded" style="background-color: rgba(0,0,0,0.2);"></span>
        <span class="close-jq-toast-single">×</span>
        <h2 class="jq-toast-heading">Error !</h2>
        <ul class="error-message">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif




@endsection