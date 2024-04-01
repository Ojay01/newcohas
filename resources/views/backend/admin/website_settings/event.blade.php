@extends('backend.admin.website_settings.index')
@section('title', 'Events Setings')

@section('settings')

<div class="card">
  <div class="card-body">
    <h4 class="header-title">
      Events
    </h4>
    <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end" onclick="openCreateEventModal()"> <i class="mdi mdi-plus"></i> Create Event</button>
    <br><br>
    <div class="alert alert-warning" role="alert">
      <i class="dripicons-information me-2"></i> This event would Appear on <strong>Website ( Frontend ) Events</strong>.
    </div>
      <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead>
          <tr style="background-color: #313a46; color: #ababab;">
            <th>Event Title</th>
            <th>Date</th>
            <th>Status</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td>title</td>
              <td>timestamp</td>
              <td>
                
                  <span class="badge badge-success">Active</span>
                
                  <span class="badge bg-danger">Inactive</span>
               
              </td>
              <td>
                <div class="dropdown text-center">
                  <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                  <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item" onclick="openEditEventModal()">Edit</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('#', showAllEvents)">Delete</a>
                  </div>
                </div>
              </td>
            </tr>
          
        </tbody>
      </table>
    @include('backend.admin.empty')
  </div> <!-- end card body-->
</div>


<!-- Modal for Create Event -->
<div class="modal fade mt-3" id="createEventModal" tabindex="-1" aria-labelledby="createEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createEventModalLabel">Create Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.website_settings.create_event') 
            </div>
        </div>
    </div>
</div>
<!-- Modal for Edit Event -->
<div class="modal fade mt-3" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.website_settings.edit_event') 
            </div>
        </div>
    </div>
</div>
<script>
    function openCreateEventModal() {
        $('#createEventModal').modal('show');
    }
    function openEditEventModal() {
        $('#editEventModal').modal('show');
    }
</script>

@endsection