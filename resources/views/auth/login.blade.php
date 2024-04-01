
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://cohasbepanda.com/uploads/system/logo/favicon.png">

    <!-- App css -->
    <link href="/public/assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/public/assets/backend/css/app.min.css" rel="stylesheet" type="text/css" />
    <!--Notify for ajax-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="public/assets/backend/js/jquery-3.6.0.min.js"></script>
</head>

<body class="auth-fluid-pages pb-0">

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="text-center text-lg-left mb-3">
                        <a href="/">
                            <span><img src="https://cohasbepanda.com/uploads/system/logo/logo-dark.png" alt="" height="35"></span>
                        </a>
                    </div>
                    <!-- title-->
                    <h4 class="mt-0">Sign in</h4>
                    <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                    <!-- form -->
                    <form action="{{route('login')}}" method="POST" id="loginForm">
                    @csrf
                        <div class="form-group mb-3">
                            <label for="emailaddress">Email</label>
                            <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                        </div>
                        <div class="form-group mb-3">
                            <a href="javascript: void(0);" class="text-muted float-end" onclick="forgotPass();"><small>Forgot your password?</small></a>
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                            <span class="text-danger" id="error_message"></span>
                        </div>
                        <div class="form-group mb-3 mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> Log in </button>
                        </div>
                    </form>

                    <form action="{{ route('password.email') }}" method="post" id="forgotForm" style="display: none;">
                    @csrf
                        <div class="form-group mb-3">
                            <a href="javascript: void(0);" class="text-muted float-end" onclick="backToLogin();"><small>Back to login</small></a>
                            <label for="forgotEmail">Email</label>
                            <input class="form-control" type="email" name="email" required="" id="forgotEmail" placeholder="Enter your email">
                        </div>
                        <div class="form-group mb-3 mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> Sent password reset link </button>
                        </div>
                    </form>
                    <!-- end form-->
                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
<!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->

<!-- App js -->
<script src="/public/assets/backend/js/app.min.js"></script>

<!--Notify for ajax-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
function forgotPass(){
    $('#loginForm').hide();
    $('#forgotForm').show();
}

function backToLogin(){
    $('#forgotForm').hide();
    $('#loginForm').show();
}
</script>



</body>

</html>
