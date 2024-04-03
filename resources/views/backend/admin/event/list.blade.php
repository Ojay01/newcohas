<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="alert alert-warning" role="alert">
			<i class="dripicons-information me-2"></i> this event would appear at <strong>Events ( backend ) Panel Event</strong>.
		</div>
		<div class="card">
			<div class="card-body">

					<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
						<thead>
							<tr style="background-color: #313a46; color: #ababab;">
								<th>Event Title</th>
								<th>from</th>
								<th>to</th>
								<th>Option</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td>Calender Title</td>
									<td>Starting Date</td>
									<td>Ending Date</td>
									<td>
										<div class="dropdown text-center">
											<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
											<div class="dropdown-menu dropdown-menu-end">
												<!-- item-->
												<a href="javascript:void(0);" class="dropdown-item" onclick="openeditEventModal()">Edit</a>
												<!-- item-->
												<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('#', showAllEvents)">Delete</a>
											</div>
										</div>
									</td>
								</tr>

						</tbody>
					</table>
				@include('backend.admin.empty')
			</div>
		</div>
	</div>
</div>


<!-- Modal for edit Event -->
<div class="modal fade mt-3" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.event.edit') 
            </div>
        </div>
    </div>
</div>

<script>
    function openeditEventModal() {
        $('#editEventModal').modal('show');
    }
</script>