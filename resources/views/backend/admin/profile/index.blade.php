@extends('layouts.admin')
@section('title', 'Profile Settings')
@section('content')
<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-settings title_icon"></i> {{('Manage Profile')}} </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end page title -->

<div class="row">
    <div id = "profile_content" class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
      
        @include('backend.admin.profile.edit')
    </div>
</div>


    @extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')

@endsection