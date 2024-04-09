<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th>Name</th>
            <th>Email</th>
            <th>Details</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($admins as $admin)
            <tr>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
                <td>
                     <br><small> <strong>Phone</strong>: {{$admin->phone}}</small>
                     <br><small> <strong>Address; </strong>: {{$admin->address}}</small>
                </td>
                <td>
                    <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editAdminModal{{ $admin->id }}">Edit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('#', showAllAdmins )">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>

        <!-- Modal for Edit Admin -->
<div class="modal fade mt-3" id="editAdminModal{{ $admin->id }}" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAdminModalLabel">Edit Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.admins.edit') 
            </div>
        </div>
    </div>
</div>
            @endforeach
    </tbody>
</table>



<script>
    function openeditAdminModal() {
        $('#editAdminModal').modal('show');
    }
</script>