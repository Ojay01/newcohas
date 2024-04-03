
<table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th>Image</th>
            <th>Name</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
      
            <tr>
                <td><img class="rounded-circle" width="50" height="50" src="#"></td>
                <td>User</td>
                <td>Department</td>
                <td>Designation</td>
                <td>
                    <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="openPermissionModal()">Permision</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="openEditTeacherModal()">Edit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('#', showAllTeachers )">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
       
    </tbody>
</table>


<!-- Modal for Edit Teacher -->
<div class="modal fade mt-3" id="editTeacherModal" tabindex="-1" aria-labelledby="editTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTeacherModalLabel">Edit Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.teacher.edit') 
            </div>
        </div>
    </div>
</div>

<!-- Modal for Edit Teacher -->
<div class="modal fade mt-3" id="editPermissionModal" tabindex="-1" aria-labelledby="editPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPermissionModalLabel"> Teacher Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.teacher.permission') 
            </div>
        </div>
    </div>
</div>

<script>
    function openEditTeacherModal() {
        $('#editTeacherModal').modal('show');
    }
    function openPermissionModal() {
        $('#editPermissionModal').modal('show');
    }
</script>

@include('backend.admin.empty')