@extends('layouts.admin')
@section('title', 'Subjects')
@section('content')

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-book-open-page-variant title_icon"></i> Subjects
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="openCreateSubjectModal()"> <i class="mdi mdi-plus"></i> Add Subjects</button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row mt-3">
            <div class="card-body subject_content">
               @include('backend.admin.subject.list')
            </div>
        </div>
    </div>
</div>


<!-- Modal for Subject -->
<div class="modal fade mt-3" id="createSubjectModal" tabindex="-1" aria-labelledby="createSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSubjectModalLabel">Create Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.subject.create') 
            </div>
        </div>
    </div>
</div>

<script>
    function openCreateSubjectModal() {
        $('#createSubjectModal').modal('show');
    }
</script>


 @extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection