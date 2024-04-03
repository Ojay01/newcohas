@extends('layouts.admin')
@section('title', 'Exam Settings')
@section('content')

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-grease-pencil title_icon"></i> Exam
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="openCreateExamModal()"> <i class="mdi mdi-plus"></i> Add Exam</button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body exam_content">
              @include('backend.admin.exam.list')
            </div>
        </div>
    </div>
</div>

<script>
    var showAllExams = function () {
        var url = '#';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.exam_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>

<!-- Modal for Create Exam -->
<div class="modal fade mt-3" id="createExamModal" tabindex="-1" aria-labelledby="createExamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createExamModalLabel">Create Exam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.exam.create') 
            </div>
        </div>
    </div>
</div>

<script>
    function openCreateExamModal() {
        $('#createExamModal').modal('show');
    }
</script>



@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection