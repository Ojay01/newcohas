@extends('layouts.admin')
@section('title', 'Parents ')
@section('content')


<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-account-circle title_icon"></i> Parents
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="openCreateParentModal()"> <i class="mdi mdi-plus"></i> Add Parent</button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body parent_content">
        @include('backend.admin.parent.list')
      </div>
    </div>
  </div>
</div>

<!-- Modal for Create Parent -->
<div class="modal fade mt-3" id="createParentModal" tabindex="-1" aria-labelledby="createParentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createParentModalLabel">Create Parent</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.parent.create') 
            </div>
        </div>
    </div>
</div>

<script>
    function openCreateParentModal() {
        $('#createParentModal').modal('show');
    }
</script>


<script>
var showAllParents = function () {
  var url = '#';

  $.ajax({
    type : 'GET',
    url: url,
    success : function(response) {
      $('.parent_content').html(response);
      initDataTable('basic-datatable');
    }
  });
}
</script>

@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection
