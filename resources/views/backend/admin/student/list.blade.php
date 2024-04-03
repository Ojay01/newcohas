
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
  <thead>
    <tr style="background-color: #313a46; color: #ababab;">
      <th>Name</th>
      <th>Status</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
      <tr>
        
        <td>Name</td>
        <td>
            <span class="badge bg-success">Active</span>
            <span class="badge bg-secondary">Deactivate</span>
        </td>
        <td>
          <div class="dropdown text-center">
  					<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
  					<div class="dropdown-menu dropdown-menu-right">
              <!-- item-->
              <!-- item-->
  						<a href="javascript:void(0);" class="dropdown-item"  onclick="openProfileModal()">Profile</a>
  						<!-- item-->
  						<a href="#" class="dropdown-item">Edit</a>
              <!-- item -->
                <a href="javascript:;" class="dropdown-item" onclick="confirmModal('#', showAllStudents)">Deactivate</a>
                <a href="javascript:;" class="dropdown-item" onclick="confirmModal('')">Activate</a>


              <a href="javascript:;" class="dropdown-item" onclick="confirmModal('#')">Delete</a>
  					</div>
  				</div>
        </td>
      </tr>
  </tbody>
</table>

<script type="text/javascript">
  initDataTable('basic-datatable');
</script>


<!-- Modal for Create Profile -->
<div class="modal fade mt-3" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Student Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.student.profile') 
            </div>
        </div>
    </div>
</div>

<script>
    function openProfileModal() {
        $('#profileModal').modal('show');
    }
</script>