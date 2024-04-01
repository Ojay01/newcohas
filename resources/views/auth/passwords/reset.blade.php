

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Password Reset | COHAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="College of Hopes, Arts and Science Oficial Website" name="description" />
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
                    <h4 class="mt-0">Reset Password</h4>
                    <p class="text-muted mb-4">Enter Your new Password to Access Account</p>

@if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close">
                                                    </button>
                                                    <strong>Oh snap!</strong>{{ session('error') }}
                                                </div><br>

    @endif
    @if ($errors->any())
    <div id="toast-container" class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close">
                                                    </button>
                                                    <strong>Oh Nooo!</strong>@foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                    <script>
        // Function to close the toast
        function closeToast() {
            var toastContainer = document.getElementById('toast-container');
            if (toastContainer) {
                toastContainer.classList.add('hide-toast');

                // Optional: Remove the toast element from the DOM after animation
                setTimeout(function () {
                    toastContainer.remove();
                }, 500);
            }
        }

        // Automatically close the toast after 5 seconds
        setTimeout(function () {
            closeToast();
        }, 5000);
    </script>
                                                </div><br>
@endif

                    <!-- form -->
                    <form action="{{route('password.update')}}" method="POST" id="loginForm">
                    @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group mb-3">
                            <label for="emailaddress">Email</label>
                            <input class="form-control" type="email" name="email" id="emailaddress" value="{{ $email ?? old('email') }}" readonly placeholder="Enter your email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                            <span class="text-danger" id="error_message"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password Confirmation</label>
                            <input class="form-control" type="password" name="password_confirmation" required="" id="password" placeholder="Enter your password">
                            <span class="text-danger" id="error_message"></span>
                        </div>
                        <div class="form-group mb-3 mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> Reset password </button>
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



</body>

</html>

