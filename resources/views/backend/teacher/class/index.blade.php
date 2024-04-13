@extends('layouts.teacher')
@section('title', 'Classes ')
@section('content')

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-book-open-page-variant title_icon"></i> Classes
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body class_content">
                @include('backend.teacher.class.list')
            </div>
        </div>
    </div>
</div>

@extends('backend.teacher.header')
@extends('backend.teacher.navigation')
@extends('backend.teacher.footer')

@endsection