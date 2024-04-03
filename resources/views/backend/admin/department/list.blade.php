<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
	<thead>
		<tr style="background-color: #313a46; color: #ababab;">
			<th>Name</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>
			<tr>
				<td>department name</td>
				<td>
					<div class="dropdown text-center">
						<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
						<div class="dropdown-menu dropdown-menu-end">
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="openeditDepartmentModal()">Edit</a>
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('#', showAllDepartments)">Delete</a>
						</div>
					</div>
				</td>
			</tr>
	</tbody>
</table>
@include('backend.admin.empty')



<!-- Modal for edit Department -->
<div class="modal fade mt-3" id="editDepartmentModal" tabindex="-1" aria-labelledby="editDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDepartmentModalLabel">Edit Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.department.edit') 
            </div>
        </div>
    </div>
</div>

<script>
    function openeditDepartmentModal() {
        $('#editDepartmentModal').modal('show');
    }
</script>