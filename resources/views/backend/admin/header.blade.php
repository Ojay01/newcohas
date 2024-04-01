@section('header')

    <!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="{{route('home')}}" class="topnav-logo" style = "min-width: unset;">
            <span class="topnav-logo-lg">
                <img src="https://cohasbepanda.com/uploads/system/logo/logo-light.png" alt="" height="40">
            </span>
            <span class="topnav-logo-sm">
                <img src="https://cohasbepanda.com/uploads/system/logo/logo-light-sm.png" alt="" height="40">
            </span>
        </a>

        <ul class="list-unstyled topbar-menu float-end mb-0">

          
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="https://cohasbepanda.com/uploads/users/placeholder.jpg" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">Co.H.A.S</span>
                                                    <span class="account-position">Admin</span>
                        
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{route('profile')}}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>My account</span>
                    </a>
                                            <!-- item-->
                        <a href="{{route('setting')}}" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-edit me-1"></i>
                            <span>Settings</span>
                        </a>
                    
                                            <!-- item-->
                        <a href="mailto:support@ameneacademy.com?Subject=Help%20On%20This" target="_blank" class="dropdown-item notify-item">
                            <i class="mdi mdi-lifebuoy me-1"></i>
                            <span>Support</span>
                        </a>
                    
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
            <h4 style="color: #fff; float: left;" class="d-none d-md-inline-block"> Cohas Bepanda</h4>
            <a href="/" target="" class="btn btn-outline-light ms-2 d-none d-md-inline-block">Visit website</a>
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


@endsection