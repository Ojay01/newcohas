
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
      @foreach($teachers as $teacher)
            <tr>
                <td>
                                    @if($teacher->user->profile_image)                
                <img class="rounded-circle" width="50" height="50" src="{{ asset('storage/app/public/profiles/' . $teacher->profile_image) }}">
                @else
                <img class="rounded-circle" width="50" height="50" src="{{ asset('/public/images/placeholder.jpg')}}">                
                @endif
                </td>
                <td>{{$teacher->user->name}}</td>
                <td>{{$teacher->department->name}}</td>
                <td>{{$teacher->designation}}</td>
                <td>
                    <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editPermissionModal{{ $teacher->id }}" >Permision</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editTeacherModal{{ $teacher->id }}" >Edit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('#', showAllTeachers )">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
       @endforeach
    </tbody>
</table>

      @foreach($teachers as $teacher)
<!-- Modal for Edit Teacher -->
<div class="modal fade mt-3" id="editTeacherModal{{ $teacher->id }}" tabindex="-1" aria-labelledby="editTeacherModalLabel" aria-hidden="true">
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
<div class="modal fade mt-3" id="editPermissionModal{{ $teacher->id }}" tabindex="-1" aria-labelledby="editPermissionModalLabel" aria-hidden="true">
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
@endforeach
<script>
    function openEditTeacherModal() {
        $('#editTeacherModal').modal('show');
    }
    function openPermissionModal() {
        $('#editPermissionModal').modal('show');
    }
</script>
