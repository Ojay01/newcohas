@extends('layouts.admin')
@section('title', 'Website Setings')

@section('content')
@extends('backend.admin.header')
@extends('backend.admin.navigation')

<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title">
          <i class="mdi mdi-settings title_icon"></i>Website Settings
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end page title -->
<div class="row">
  <div class="col-md-3">
    <a href="#" class="btn  btn-dark  btn-secondary  btn-rounded d-block mb-1">Noticeboard <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{route('eventSettings')}} " class="btn  btn-dark  btn-secondary  btn-rounded d-block mb-1">Events <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="#" class="btn  btn-dark  btn-secondary  btn-rounded d-block mb-1">Teachers <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{route('gallerySettings')}} " class="btn  btn-dark btn-secondary  btn-rounded d-block mb-1">Gallery <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{route('aboutUsSettings')}}" class="btn  btn-dark  btn-secondary  btn-rounded d-block mb-1">About Us <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="#" class="btn btn-dark  btn-secondary btn-rounded d-block mb-1">Terms And Conditions <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="#" class="btn  btn-dark  btn-secondary  btn-rounded d-block mb-1">Privacy Policy <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="#" class="btn  btn-dark  btn-secondary  btn-rounded d-block mb-1">Homepage Slider <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="" class="btn  btn-dark  btn-secondary  btn-rounded d-block mb-1">Laboratory Slider <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{route('websiteSettings')}} " class="btn  btn-dark  btn-secondary  btn-rounded d-block mb-1">General Settings <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="#" class="btn  btn-secondary btn-rounded d-block mb-1">Others <i class="mdi mdi-arrow-right float-end"></i></a>
  </div>
  <div class="col-md-9 page_content">
   @yield('settings')
  </div>
</div>

@extends('backend.admin.footer')

@endsection