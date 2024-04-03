@extends('layouts.admin')
@section('title', 'Teacher Settings')
@section('content')


<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-library title_icon title_icon"></i> Class Rooms
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="opencreateClassRoomModal()"> <i class="mdi mdi-plus"></i> Add Class Room</button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body class_room_content">
                @include('backend.admin.class_room.list')
            </div>
        </div>
    </div>
</div>

<script>
    var showAllClassRooms = function () {
        var url = '#';

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('.class_room_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>


<div class="modal fade mt-3" id="createClassRoomModal" tabindex="-1" aria-labelledby="createClassRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createClassRoomModalLabel">Create Class Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.class_room.create') 
            </div>
        </div>
    </div>
</div>

<script>
    function opencreateClassRoomModal() {
        $('#createClassRoomModal').modal('show');
    }
</script>
   @extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection