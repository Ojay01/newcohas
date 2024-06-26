@extends('layouts.header')

@section('title', 'Terms And Conditions')

@section('content')



<!-- ========== MAIN ========== -->
<main id="content" role="main">
  <!-- Hero Section -->
  <div class="gradient-half-primary-v1">
    <div class="container text-center space-top-4 space-top-md-4 space-top-lg-3 space-bottom-1">
      <!-- Title -->
      <div class="w-md-80 w-lg-50 mx-auto mb-5">
        <h1 class="h1 text-white">
          <span class="font-weight-semi-bold">{{('Terms And Conditions')}}</span>
        </h1>
      </div>
      <!-- End Title -->
    </div>
  </div>
  <!-- End Hero Section -->

  <!-- About section starts -->
  <div class="gradient-half-primary-v3">
    <div class="container space-2 space-md-3">
                   {!! htmlspecialchars_decode(stripslashes($sliderSettings['terms_and_conditions'])) !!}
    </div>
  </div>
  <!-- About section ends -->
</main>
  <!-- ========== END MAIN ========== -->

@extends('frontend.footer')
@endsection