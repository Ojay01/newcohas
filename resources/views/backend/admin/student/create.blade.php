@extends('layouts.admin')
@section('title', 'Admission ')
@section('content')

<!--title-->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body py-2">
                <h4 class="page-title">
                    <i class="mdi mdi-account-multiple-plus title_icon"></i> Student Admission Form
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card pt-0">
            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                <li class="nav-item">
                    <a href="{{route('singleAdmission')}}" class="nav-link rounded-0 {{ Route::currentRouteName() == 'singleAdmission' ? 'active' : '' }}">
                        <i class="mdi mdi-home-variant d-lg-none d-block me-1"></i>
                        <span class="d-none d-lg-block">Single Student Admission</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('bulkAdmission')}}" class="nav-link rounded-0 {{ Route::currentRouteName() == 'bulkAdmission' ? 'active' : '' }}">
                        <i class="mdi mdi-account-circle d-lg-none d-block me-1"></i>
                        <span class="d-none d-lg-block">Bulk Admission</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active">
                    @if(Route::currentRouteName() == 'singleAdmission')
                        @include('backend.admin.student.single')
                    @elseif(Route::currentRouteName() == 'bulkAdmission')
                        @include('backend.admin.student.bulk')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')

@endsection
