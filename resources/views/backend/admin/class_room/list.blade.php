
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
	<thead>
		<tr style="background-color: #313a46; color: #ababab;">
			<th>Name</th>
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
    @foreach ($classrooms as $classroom)
			<tr>
				<td>{{$classroom->name}}</td>
				<td>
					<div class="dropdown text-center">
						<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
						<div class="dropdown-menu dropdown-menu-end">
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editClassRoomModal{{ $classroom->id }}">Edit</a>
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item" onclick="confirmDelete('{{route('classroom.destroy', ['classroom' => $classroom->id])}}')">Delete</a>
						</div>
					</div>
				</td>
			</tr>

<div class="modal fade mt-3" id="editClassRoomModal{{ $classroom->id }}" tabindex="-1" aria-labelledby="editClassRoomModalLabel" aria-hidden="true">
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

            @endforeach
	</tbody>
</table>
@include('backend.admin.empty')

<div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Heads Up!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Cancel</button>
                   <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger my-2">Delete</button>
                </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    function confirmDelete(url) {
        $('#deleteForm').attr('action', url);
        $('#confirmationModal').modal('show');
    }
</script>
<script>
    function openeditClassRoomModal() {
        $('#editClassRoomModal').modal('show');
    }
</script>