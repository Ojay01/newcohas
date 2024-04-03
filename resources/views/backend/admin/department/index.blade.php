@extends('layouts.admin')
@section('title', 'Department Settings')
@section('content')

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-content-paste title_icon"></i> Department
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="openCreateDepartmentModal()"> <i class="mdi mdi-plus"></i> Add Department</button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body department_content">
               @include('backend.admin.department.list')
            </div>
        </div>
    </div>
</div>

<script>
    var showAllDepartments = function () {
        var url = '#';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.department_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>


<!-- Modal for Create Department -->
<div class="modal fade mt-3" id="createDepartmentModal" tabindex="-1" aria-labelledby="createDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDepartmentModalLabel">Create Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.department.create') 
            </div>
        </div>
    </div>
</div>

<script>
    function openCreateDepartmentModal() {
        $('#createDepartmentModal').modal('show');
    }
</script>

@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection