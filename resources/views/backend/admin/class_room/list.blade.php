<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
	<thead>
		<tr style="background-color: #313a46; color: #ababab;">
			<th>Name</th>
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
			<tr>
				<td>Class Name</td>
				<td>
					<div class="dropdown text-center">
						<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
						<div class="dropdown-menu dropdown-menu-end">
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="openeditClassRoomModal()">Edit</a>
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('#', showAllClassRooms)">Delete</a>
						</div>
					</div>
				</td>
			</tr>
	</tbody>
</table>
@include('backend.admin.empty')





<div class="modal fade mt-3" id="editClassRoomModal" tabindex="-1" aria-labelledby="editClassRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClassRoomModalLabel">Edit Class Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.class_room.edit') 
            </div>
        </div>
    </div>
</div>

<script>
    function openeditClassRoomModal() {
        $('#editClassRoomModal').modal('show');
    }
</script>