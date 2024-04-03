<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
	<thead>
		<tr style="background-color: #313a46; color: #ababab;">
			<th>Parent Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
			<tr>
				<td>1</td>
				<td>Name</td>
				<td>Email</td>
				<td>
					<div class="dropdown text-center">
						<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
						<div class="dropdown-menu dropdown-menu-end">
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="openeditParentModal()">Edit</a>
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('#', showAllParents )">Delete</a>
						</div>
					</div>
				</td>
			</tr>
	</tbody>
</table>

<!-- Modal for edit Parent -->
<div class="modal fade mt-3" id="editParentModal" tabindex="-1" aria-labelledby="editParentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editParentModalLabel">Edit Parent</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.parent.edit') 
            </div>
        </div>
    </div>
</div>

<script>
    function openeditParentModal() {
        $('#editParentModal').modal('show');
    }
</script>
@include('backend.admin.empty')