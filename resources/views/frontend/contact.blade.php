@extends('layouts.header')

@section('title', 'Contact')

@section('content')

<!-- ========== MAIN ========== -->
<main id="content" role="main">
  <!-- Hero Section -->
  <div class="gradient-half-primary-v1">
    <div class="container text-center space-top-4 space-top-md-4 space-top-lg-3 space-bottom-1">
      <!-- Title -->
      <div class="w-md-80 w-lg-50 mx-auto mb-5">
        <h1 class="h1 text-white">
          <span class="font-weight-semi-bold">{{('Contact Us')}}</span>
        </h1>
      </div>
      <!-- End Title -->
    </div>
  </div>
  <!-- End Hero Section -->

  <!-- Contacts Info Section -->
  <div class="clearfix space-1">

    <!-- Title -->
    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5">
      <span class="btn btn-xs btn-soft-success btn-pill mb-2">{{('Contact Info')}}</span>
    </div>
    <!-- End Title -->
    <div class="row no-gutters">

      <div class="col-sm-6 col-lg-3 u-ver-divider u-ver-divider--none-lg">
        <!-- Contacts Info -->
        <div class="text-center py-5">
          <figure id="icon8" class="svg-preloader ie-height-56 max-width-8 mx-auto mb-3">
            <img class="js-svg-injector" src="/public/assets/frontend/ultimate/svg/icons/icon-8.svg" alt="SVG"
                 data-parent="#icon8">
          </figure>
          <h2 class="h6 mb-0">{{('Address')}}</h2>
          <p class="mb-0">
            {{$settings->address}}
          </p>
        </div>
        <!-- End Contacts Info -->
      </div>

      <div class="col-sm-6 col-lg-3 u-ver-divider u-ver-divider--none-lg">
        <!-- Contacts Info -->
        <div class="text-center py-5">
          <figure id="icon15" class="svg-preloader ie-height-56 max-width-8 mx-auto mb-3">
            <img class="js-svg-injector" src="/public/assets/frontend/ultimate/svg/icons/icon-15.svg" alt="SVG"
                 data-parent="#icon15">
          </figure>
          <h3 class="h6 mb-0">{{('Email')}}</h3>
          <p class="mb-0">
            {{$settings->system_email}}
          </p>
        </div>
        <!-- End Contacts Info -->
      </div>

      <div class="col-sm-6 col-lg-3 u-ver-divider u-ver-divider--none-lg">
        <!-- Contacts Info -->
        <div class="text-center py-5">
          <figure id="icon16" class="svg-preloader ie-height-56 max-width-8 mx-auto mb-3">
            <img class="js-svg-injector" src="/public/assets/frontend/ultimate/svg/icons/icon-16.svg" alt="SVG"
                 data-parent="#icon16">
          </figure>
          <h3 class="h6 mb-0">{{('Phone ')}}</h3>
          <p class="mb-0">
           {{$settings->phone}}
          </p>
        </div>
        <!-- End Contacts Info -->
      </div>

      <div class="col-sm-6 col-lg-3">
        <!-- Contacts Info -->
        <div class="text-center py-5">
          <figure id="icon17" class="svg-preloader ie-height-56 max-width-8 mx-auto mb-3">
            <img class="js-svg-injector" src="/public/assets/frontend/ultimate/svg/icons/icon-17.svg" alt="SVG"
                 data-parent="#icon17">
          </figure>
          <h3 class="h6 mb-0">{{('Registration')}}</h3>
          <p class="mb-0">
           {{$settings->registration}}
          </p>
        </div>
        <!-- End Contacts Info -->
      </div>
    </div>
  </div>
  <!-- End Contacts Info Section -->
@if(session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show mb-0 text-center" role="alert">
        <strong>Bravo! </strong>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <br>
    <style>
        #success-alert {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            z-index: 1000;
        }
    </style>
    <script>
        // Auto hide the success alert after 5 seconds
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 5000);
    </script>
@endif

@if(session('error'))
    <div id="success-alert" class="alert alert-danger alert-dismissible fade show mb-0 text-center" role="alert">
        <strong>ooops! </strong>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <br>
    <style>
        #success-alert {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            z-index: 1000;
        }
    </style>
    <script>
        // Auto hide the success alert after 5 seconds
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 5000);
    </script>
@endif
 @if ($errors->any())
    <div id="success-alert" class="alert alert-danger alert-dismissible fade show mb-0 text-center" role="alert">
        <strong>ooops! </strong>@foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <br>
    <style>
        #success-alert {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            z-index: 1000;
        }
    </style>
    <script>
        // Auto hide the success alert after 5 seconds
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 5000);
    </script>
@endif


  <hr class="my-0">

  <!-- Contact Form Section -->
  <div class="container space-2 space-md-3">
    <!-- Title -->
    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-9">
      <span class="btn btn-xs btn-soft-success btn-pill mb-2">{{('Contact Form')}}</span>
      <h2 class="text-primary font-weight-normal">
        {{('Send Us a Message')}}
      </h2>
    </div>
    <!-- End Title -->

    <div class="w-lg-80 mx-auto">
      <!-- Contacts Form -->
      <form action="{{route('contactForm')}} " method="post" class="js-validate">
      @csrf
        <div class="row">
          <!-- Input -->
          <div class="col-sm-6 mb-6">
            <div class="js-form-message">
              <label class="form-label">
               {{('First Name')}}
                <span class="text-danger">*</span>
              </label>

              <input type="text" class="form-control" name="first_name" placeholder="Your First Name" required
                     data-msg="Please enter your first name."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->

          <!-- Input -->
          <div class="col-sm-6 mb-6">
            <div class="js-form-message">
              <label class="form-label">
               {{('Last Name')}}
                <span class="text-danger">*</span>
              </label>

              <input type="text" class="form-control" name="last_name" placeholder="Your Last Name" required
                     data-msg="Please enter your last name."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->

          <!-- Input -->
          <div class="col-sm-6 mb-6">
            <div class="js-form-message">
              <label class="form-label">
                {{('Your Email Address')}}
                <span class="text-danger">*</span>
              </label>

              <input type="email" class="form-control" name="email" placeholder="Your  email" required
                     data-msg="Please enter a valid email address."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->

          <!-- Input -->
          <div class="col-sm-6 mb-6">
            <div class="js-form-message">
              <label class="form-label">
                {{('Your Phone Number')}}
                <span class="text-danger">*</span>
              </label>

              <input type="number" class="form-control" name="phone" placeholder="Your Phone number" required
                     data-msg="Please enter a valid phone number."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->

          <div class="w-100"></div>

          <!-- Input -->
          <div class="col-sm-12 mb-6">
            <div class="js-form-message">
              <label class="form-label">
                {{('Location')}}
                <span class="text-danger">*</span>
              </label>

              <input type="text" class="form-control" name="address" placeholder="Your home address" required
                     data-msg="Please enter your location."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->
        </div>

        <!-- Input -->
        <div class="js-form-message mb-6">
          <label class="form-label">
           {{('Suggestions or Questions')}}
            <span class="text-danger">*</span>
          </label>

          <div class="input-group">
            <textarea class="form-control" rows="4" name="comment" placeholder="How can we help you?" required
                      data-msg="Please enter your message."
                      data-error-class="u-has-error"
                      data-success-class="u-has-success"></textarea>
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary btn-wide transition-3d-hover mb-4">{{('Submit')}}</button>
        </div>

      </form>
      <!-- End Contacts Form -->
    </div>
  </div>
  <!-- End Contact Form Section -->


@extends('frontend.footer')
@endsection