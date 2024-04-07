@extends('layouts.admin')

@section('content')

@extends('backend.admin.header')
@extends('backend.admin.navigation')

<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title"> <i class="mdi mdi-view-dashboard title_icon"></i> Dashboard </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end page title -->

<div class="row ">
  <div class="col-xl-12">
    <div class="row">
      <div class="col-xl-8">
        <div class="row">
          <div class="col-lg-6">
            <div class="card widget-flat" id="student" style="on">
              <div class="card-body">
                <div class="float-end">
                  <i class="mdi mdi-account-multiple widget-icon"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Number of Student"> <i class="mdi mdi-account-group title_icon"></i>  Students <a href="{{route('students')}}" style="color: #6c757d; display: none;" id = "student_list"><i class = "mdi mdi-export"></i></a></h5>
                <h3 class="mt-3 mb-3">
                  {{$studentCount}}
                </h3>
                <p class="mb-0 text-muted">
                  <span class="text-nowrap">{{('Total number of Students')}}</span>
                </p>
              </div> <!-- end card-body-->
            </div> <!-- end card-->
          </div> <!-- end col-->

          <div class="col-lg-6">
            <div class="card widget-flat" id="teacher" style="on">
              <div class="card-body">
                <div class="float-end">
                  <i class="mdi mdi-account-multiple widget-icon"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Number of Teacher"> <i class="mdi mdi-account-group title_icon"></i>Teachers  <a href="{{ route('admin.teachers') }}" style="color: #6c757d; display: none;" id = "teacher_list"><i class = "mdi mdi-export"></i></a></h5>
                <h3 class="mt-3 mb-3">
                  {{$teacherCount}}
                </h3>
                <p class="mb-0 text-muted">
                  <span class="text-nowrap">total number of teachers</span>
                </p>
              </div> <!-- end card-body-->
            </div> <!-- end card-->
          </div> <!-- end col-->
        </div> <!-- end row -->

        <div class="row">
          <div class="col-lg-6">
            <div class="card widget-flat" id = "parent">
              <div class="card-body">
                <div class="float-end">
                  <i class="mdi mdi-account-multiple widget-icon"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Number of Parents"> <i class="mdi mdi-account-group title_icon"></i> Parents <a href="{{route('parents')}}" style="color: #6c757d; display: none;" id = "parent_list"><i class = "mdi mdi-export"></i></a></h5>
                <h3 class="mt-3 mb-3">
                {{$parentCount}}
                </h3>
                <p class="mb-0 text-muted">
                  <span class="text-nowrap">total number of parents</span>
                </p>
              </div> <!-- end card-body-->
            </div> <!-- end card-->
          </div> <!-- end col-->

          
        </div>
      </div> <!-- end col -->
      <div class="col-xl-4">
        <div class="card bg-primary">
          <div class="card-body">
            <h4 class="header-title text-white mb-2">Today's Attendance</h4>
            <div class="text-center">
              <h3 class="font-weight-normal text-white mb-2">
                0
              </h3>
              <p class="text-light text-uppercase font-13 font-weight-bold">0 students are attending today</p>
              <a href="#" class="btn btn-outline-light btn-sm mb-1">Go to Attendance
                <i class="mdi mdi-arrow-right ms-1"></i>
              </a>

            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h4 class="header-title">{{('Recent Events')}}<a href="#" style="color: #6c757d;"><i class = "mdi mdi-export"></i></a></h4>
            @include('backend.admin.events')
          </div>
        </div>
      </div>
    </div>
  </div><!-- end col-->
</div>


<script>
$(document).ready(function() {
  initDataTable("expense-datatable");
});

$(".widget-flat").mouseenter(function() {
  var id = $(this).attr('id');
  $('#'+id+'_list').show();
}).mouseleave(function() {
  var id = $(this).attr('id');
  $('#'+id+'_list').hide();
});
</script>

@extends('backend.admin.footer')
@endsection