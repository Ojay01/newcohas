@extends('layouts.admin')
@section('title', 'Admission')

@section('content')

@extends('backend.admin.header')
@extends('backend.admin.navigation')

<!--title-->
<div class="row d-print-none">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body py-2">
                <h4 class="page-title d-inline-block">
                    <i class="mdi mdi-calendar-today title_icon"></i> Online Admission
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row d-print-none">
    <div class="col-12">
        <div class="card ">
            <div class="card-body">
                @include('backend.admin.online_admission.list')
            </div>
        </div>
    </div>
</div>
@extends('backend.admin.footer')
@endsection