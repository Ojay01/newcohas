@extends('layouts.header')

@section('title', 'Home')

@section('content')

<!-- ========== MAIN ========== -->
  <main id="content" role="main">

    <!-- Slider Section -->
    <div class="u-hero-v1">
      <!-- Slick carousal starts -->
<div class="js-slick-carousel u-slick"
     data-autoplay="true"
     data-speed="10000"
     data-infinite="true"
     data-adaptive-height="true"
     data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
     data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
     data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4">

    @foreach ($sliderImages as $sliderImage)
    <div class="js-slide bg-img-hero-center" style="background-image: url({{ asset('storage/app/public/slider_images/'.$sliderImage['image']) }});">
      <div class="text-center space-3">
        <h2 class="text-white font-weight-light mb-2"
            data-scs-animation-in="fadeInUp" style="padding-top: 100px;">
         {{ $sliderImage['title'] }}
        </h2>

        <p class="text-white mx-auto w-50 d-none d-sm-block"
           data-scs-animation-in="fadeInUp"
           data-scs-animation-delay="200">
             {!! htmlspecialchars_decode(stripslashes($sliderImage['description'])) !!}
           </p>
      </div>
    </div>
@endforeach


</div>

      <!-- Slick carousal ends -->
    </div>
    <!-- End Slider Section -->

    <hr class="my-0">

    <!-- Intro Section -->
    <div class="overflow-hidden">
      <div class="container space-2 space-md-2">
        <div class="row justify-content-between align-items-center">

         <style>
    .border-box:hover {
        background-color: #997950 ;
    }
</style>

<div class="col-lg-5 position-relative">
    <h3 class="bg-primary text-white p-2">Quick Links</h3>
    <div class="border rounded p-3 mb-3">
        <div class="border-bottom mb-3 border-box">
            <a href="{{route('discipline')}} " class="text-dark d-block p-2">Discipline/Specialties</a>
        </div>
        <div class="border-bottom mb-3 border-box">
            <a href="{{route('tutorials')}} " class="text-dark d-block p-2">Tutorials</a>
        </div>
        <div class="border-bottom mb-3 border-box">
            <a href="{{route('assignments')}} " class="text-dark d-block p-2">Assignments</a>
        </div>
        <div class="border-bottom mb-3 border-box">
            <a href="{{route('login')}}" class="text-dark d-block p-2">Submission of marks</a>
        </div>
        <div class="border-bottom mb-3 border-box">
            <a href="https://minesec-distancelearning.cm/" target="_blank" class="text-dark d-block p-2">Distance learning</a>
        </div>
    </div>
</div>



          <div class="col-lg-7 mb-7 mb-lg-0">
            <div class="pr-md-4">
              <!-- Title -->
              <div class="mb-7">
                <span class="btn btn-xs btn-soft-success btn-pill mb-2">About</span>
                <h2 class="primary">
                 {{$sliderSettings->homepage_note_title}}
                </h2>
                <p style="text-align: justify;">
                 {!! htmlspecialchars_decode(stripslashes($sliderSettings->homepage_note_description)) !!}
                </p>
              </div>
              <!-- End Title -->

              <a class="btn btn-sm btn-primary btn-wide transition-3d-hover"
                href="{{route('about')}}">
                  Learn More <span class="fas fa-angle-right ml-2"></span></a>
            </div>
          </div>

          
        </div>
      </div>
    </div>
    <!-- End Intro Section -->
    <hr class="my-o">
    <!-- Slider Section -->
    <div class="bg-light">
    <div class="container space-2 space-md-3">
      <!-- Title -->
      <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-9">
        <span class="btn btn-xs btn-soft-success btn-pill mb-2">Laboratories</span>
        <h2 class="primary">Our Science Laboratories</span></h2>
      </div>
      <!-- Slick carousal starts -->
      <div class="js-slick-carousel u-slick"
           data-autoplay="true"
           data-speed="10000"
           data-infinite="true"
           data-adaptive-height="true"
           data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
           data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
           data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4">

        <div class="js-slide bg-img-hero-center" style="background-image: ;">
          <div class="text-center space-3">
           
          </div>
        </div>

      </div>
      <!-- Slick carousal ends -->
    </div>
    </div>
    <!-- End Slider Section -->

    <!--Principal-->
    <hr class="my-0">

    <!-- Intro Section -->
    <div class="overflow-hidden">
      <div class="container space-2 space-md-2">
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-7 mb-7 mb-lg-0">
            <div class="pr-md-4">
              <!-- Title -->
              <div class="mb-7" style="font-family: 'Poppins', sans-serif;">
                <span class="btn btn-xs btn-soft-success btn-pill mb-2">The Principal</span>
                <h2 class="primary">
                 Message From the Principal
                </h2>
               
                 {!! htmlspecialchars_decode(stripslashes($sliderSettings->principal)) !!}
             
              </div>
              <!-- End Title -->

             
            </div>
          </div>

          <div class="col-lg-5 position-relative">
            <!-- SVG Mockup -->
            <figure class="ie-ellipse-mockup">
              <img class="js-svg-injector" src="/public/assets/frontend/ultimate/svg/illustrations/ellipse-mockup.svg" alt="Image Description"
                   data-img-paths='[
                     {"targetId": "#SVGellipseMockupImg1", "newPath": "{{ asset('storage/app/public/logos/' . $sliderSettings->principal_image) }}"}
                   ]'
                   data-parent="#SVGellipseMockup">
            </figure>
            <!-- End SVG Mockup -->
          </div>
        </div>
      </div>
    </div>
    <!-- End of Principal -->

    <!-- Affiliate -->
    <div class="bg-light">
    <div class="container space-2 space-md-1">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-9">
            <span class="btn btn-xs btn-soft-success btn-pill mb-2">Affiliates</span>
            <h2 class="primary">Our Partners</h2>
        </div>
        <div class="row justify-content-center text-center" >
            <div class="col-md-6 mb-4 partner-logo space-md-1">
                <a href="https://www.minesec.gov.cm/web/index.php/en/" target="_blank">
                    <img src="https://www.minesec.gov.cm/web/images/logo-black.png" alt="MINSEC" class="img-fluid" height="34px" width="164px">
                </a>
            </div>
             <div class="col-md-6 mb-4  partner-logo space-md-1">
                <a href="https://camgceb.org/" target="_blank">
                    <img src="https://camgceb.org/wp-content/uploads/2020/08/cropped-gceb-logo-2-180x180.jpg" alt="GCE Board" class="img-fluid" height="24px" width="44px">
                </a>
            </div>
            <div class="col-md-6  mb-4 partner-logo space-md-1">
                <a href="#" target="_blank">
                    <img src="https://th.bing.com/th/id/R.8a690590b2f0a742bb84618974541e7b?rik=UJO%2fc9Z6AF%2b%2fBQ&pid=ImgRaw&r=0" alt="MTN MoMo" class="img-fluid" height="24px" width="44px">
                </a>
            </div>
            <div class="col-md-6  mb-4 partner-logo space-md-1">
                <a href="https://www.ameneacademy.com" target="_blank">
                    <img src="https://ameneacademy.com/uploads/system/9444fa07bac24944bbdfc42548cdd281.png" alt="Amene Academy" class="img-fluid" height="24px" width="44px">
                </a>
            </div>
           
            <!-- Add more affiliate logos here -->
        </div>
    </div>
</div>
<style>
    .partner-logo {
        width: 50%;
        transition: background-color 0.3s ease;
    }
    .partner-logo:hover {
        background-color: #997950;
    }
</style>


  </main>
  <!-- ========== END MAIN ========== -->



@extends('frontend.footer')
@endsection