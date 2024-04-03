@extends('layouts.admin')
@section('title', 'Teacher Settings')
@section('content')

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-account-circle title_icon"></i> Teachers
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="openCreateTeacherModal()"> <i class="mdi mdi-plus"></i> Create a Teacher</button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body teacher_content">
        @include('backend.admin.teacher.list')
      </div>
    </div>
  </div>
</div>

<script>
var showAllTeachers = function () {
  var url = '{{route("teachers")}}';

  $.ajax({
    type : 'GET',
    url: url,
    success : function(response) {
      $('.teacher_content').html(response);
      initDataTable('basic-datatable');
    }
  });
}
</script>


<!-- Modal for Create Teacher -->
<div class="modal fade mt-3" id="createTeacherModal" tabindex="-1" aria-labelledby="createTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTeacherModalLabel">Create Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.teacher.create') 
            </div>
        </div>
    </div>
</div>

<script>
    function openCreateTeacherModal() {
        $('#createTeacherModal').modal('show');
    }
</script>

   @extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection