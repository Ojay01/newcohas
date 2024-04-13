@extends('layouts.teacher')
@section('title', 'Classrooms ')
@section('content')

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-library title_icon title_icon"></i> Classrooms
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body class_room_content">
                @include('backend.teacher.classroom.list')
            </div>
        </div>
    </div>
</div>

@extends('backend.teacher.header')
@extends('backend.teacher.navigation')
@extends('backend.teacher.footer')

@endsection