
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th>Name</th>
            <th>Section</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>Name</td>
                <td>
                    <ul>
                        <li> Section </li>
                    </ul>
                </td>
                <td>
                    <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="openSectionsModal()">Sections</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="openEditModal()">Edit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('#', showAllClasses)">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
    </tbody>
</table>
@include('backend.admin.empty')


<div class="modal fade mt-3" id="createSectionsModal" tabindex="-1" aria-labelledby="createSectionsModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSectionLabel"> Sections</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.class.sections') 
            </div>
        </div>
    </div>
</div>


<div class="modal fade mt-3" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.class.edit') 
            </div>
        </div>
    </div>
</div>


<script>
    function openSectionsModal() {
        $('#createSectionsModal').modal('show');
    }
    function openEditModal() {
        $('#editModal').modal('show');
    }
</script>