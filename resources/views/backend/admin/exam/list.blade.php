
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th>Exam Name</th>
            <th>Starting Date</th>
            <th>Ending Date</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
@foreach($exams as $exam)
	<tr>
	    <td>{{ $exam->name }}</td>
	    <td>{{ \Carbon\Carbon::parse($exam->starting_date)->format('d F Y') }}</td>
	    <td>{{ \Carbon\Carbon::parse($exam->ending_date)->format('d F Y') }}</td>
	    <td>
        <div class="dropdown text-center">
					<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
					<div class="dropdown-menu dropdown-menu-end">
						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editExamModal{{ $exam->id }}">Edit</a>
						<!-- item-->
						<button class="dropdown-item delete_exam" data-url="{{ route('exam.delete', $exam) }}">Delete</button>
					</div>
				</div>
	    </td>
	</tr>

    <!-- Modal for edit Exam -->
<div class="modal fade mt-3" id="editExamModal{{ $exam->id }}" tabindex="-1" aria-labelledby="editExamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editExamModalLabel">Edit Exam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.exam.edit') 
            </div>
        </div>
    </
    @endforeach
	</tbody>
</table>
@include('backend.admin.empty')
<!-- Info Alert Modal -->
<div id="exam_delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Heads Up!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Cancel</button>
                    <a href="" id="exam_delete_url" class="btn btn-danger my-2">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div>
</div>

<script>
    $(document).ready(function() {
    // Handle click on delete button
    $('.delete_exam').click(function() {
        var url = $(this).data('url');
        $('#exam_delete_url').attr('href', url); // Set href attribute
        $('#exam_delete').modal('show');
    });

    // Handle click on "Continue" button in the modal
    $('#exam_delete_url').click(function(e) {
        e.preventDefault(); // Prevent default link behavior
        var url = $(this).attr('href'); // Get the URL from href attribute
        $.ajax({
            url: url,
            type: 'DELETE', // Send a DELETE request
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
            },
            success: function(response) {
                // Handle success response
                console.log(response);
                // Reload the page or perform any other action as needed
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
            }
        });
    });
});

    </script>