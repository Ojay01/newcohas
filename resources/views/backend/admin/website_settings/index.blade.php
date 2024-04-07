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
    <a href="{{ route('noticeboardSettings') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'noticeboardSettings' ? 'btn-dark' : '' }}">Noticeboard <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{ route('eventSettings') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'eventSettings' ? 'btn-dark' : '' }}">Events <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{ route('admin.teachers') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'admin.teachers' ? 'btn-dark' : '' }}">Teachers <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{ route('gallerySettings') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'gallerySettings' ? 'btn-dark' : '' }}">Gallery <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{ route('aboutUsSettings') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'aboutUsSettings' ? 'btn-dark' : '' }}">About Us <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{ route('termsSettings') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'termsSettings' ? 'btn-dark' : '' }}">Terms And Conditions <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{ route('privacySettings') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'privacySettings' ? 'btn-dark' : '' }}">Privacy Policy <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{ route('homepageSettings') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'homepageSettings' ? 'btn-dark' : '' }}">Homepage Slider <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{ route('labSettings') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'labSettings' ? 'btn-dark' : '' }}">Physics Laboratory <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{ route('chemLab') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'chemLab' ? 'btn-dark' : '' }}">Chemistry Laboratory <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{ route('bioLab') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'bioLab' ? 'btn-dark' : '' }}">Biology Laboratory <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{ route('comLab') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'comLab' ? 'btn-dark' : '' }}">Computer Laboratory <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{ route('websiteSettings') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'websiteSettings' ? 'btn-dark' : '' }}">General Settings <i class="mdi mdi-arrow-right float-end"></i></a>
    <a href="{{ route('others') }}" class="btn btn-secondary btn-rounded d-block mb-1 {{ Route::currentRouteName() == 'others' ? 'btn-dark' : '' }}">Others <i class="mdi mdi-arrow-right float-end"></i></a>
</div>

  <div class="col-md-9 page_content">
   @yield('settings')
  </div>
</div>

@extends('backend.admin.footer')

@endsection