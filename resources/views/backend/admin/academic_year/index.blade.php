@extends('layouts.admin')
@section('title', 'Academic Year')
@section('content')

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-calendar-range title_icon"></i> Academic Year
        </h4>
        <!--button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="openCreateAcademicYearModal()"> <i class="mdi mdi-plus"></i> Add Academic Year</button-->
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row session_content">
   @include('backend.admin.academic_year.list')
</div>

<!-- Modal for Create Exam -->
<div class="modal fade mt-3" id="createAcademicYearModal" tabindex="-1" aria-labelledby="createAcademicYearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createAcademicYearModalLabel">Create Academic Year</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.academic_year.create') 
            </div>
        </div>
    </div>
</div>
<script>
    function openCreateAcademicYearModal() {
        $('#createAcademicYearModal').modal('show');
    }
</script>


@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection