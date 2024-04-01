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
            Douala
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
            example@gmail.com
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
            +237
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
          <h3 class="h6 mb-0">{{('fax')}}</h3>
          <p class="mb-0">
            {{('000000')}}
          </p>
        </div>
        <!-- End Contacts Info -->
      </div>
    </div>
  </div>
  <!-- End Contacts Info Section -->

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
      <form action="#" method="post" class="js-validate">
      @csrf
        <div class="row">
          <!-- Input -->
          <div class="col-sm-6 mb-6">
            <div class="js-form-message">
              <label class="form-label">
               {{('First Name')}}
                <span class="text-danger">*</span>
              </label>

              <input type="text" class="form-control" name="first_name"  required
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

              <input type="text" class="form-control" name="last_name"  required
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

              <input type="email" class="form-control" name="email" required
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

              <input type="number" class="form-control" name="phone" required
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

              <input type="text" class="form-control" name="address" required
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
            <textarea class="form-control" rows="4" name="comment" required
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