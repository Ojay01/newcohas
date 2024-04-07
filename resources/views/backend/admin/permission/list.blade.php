<div class="card-body permission_content">
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
      <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th>Teacher</th>
            <th>Marks</th>
            <th>Assignment</th>
            <th>Tutorials</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
<tr>
    <td>{{ $teacher->user->name }}</td>
    <td>
        <input type="checkbox" value="{{ $teacher->user_id }}" id="marks_{{ $teacher->user_id }}"
            data-switch="success" onchange="togglePermission(this, 'marks', '{{ $teacher->user_id }}')"
            {{ optional($teacherPermissions[$teacher->user_id])->marks ? 'checked' : '' }}>
        <label for="marks_{{ $teacher->user_id }}" data-on-label="Yes" data-off-label="No"></label>
    </td>
    <td>
        <input type="checkbox" value="{{ $teacher->user_id }}" id="assignment_{{ $teacher->user_id }}"
            data-switch="success" onchange="togglePermission(this, 'assignment', '{{ $teacher->user_id }}')"
            {{ optional($teacherPermissions[$teacher->user_id])->assignment ? 'checked' : '' }}>
        <label for="assignment_{{ $teacher->user_id }}" data-on-label="Yes" data-off-label="No"></label>
    </td>
    <td>
        <input type="checkbox" value="{{ $teacher->user_id }}" id="tutorial_{{ $teacher->user_id }}"
            data-switch="success" onchange="togglePermission(this, 'tutorial', '{{ $teacher->user_id }}')"
            {{ optional($teacherPermissions[$teacher->user_id])->tutorial ? 'checked' : '' }}>
        <label for="tutorial_{{ $teacher->user_id }}" data-on-label="Yes" data-off-label="No"></label>
    </td>
</tr>
@endforeach

	</tbody>
</table>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               
            </div>
        </div>
    </div>
</div>


<script>

        // Function to show the success notification
        function showSuccessNotification(message) {
            // Create the notification HTML structure
            var successNotification = $('<div class="jq-toast-wrap top-right">' +
                '<div class="jq-toast-single jq-has-icon jq-icon-success">' +
                '<span class="jq-toast-loader jq-toast-loaded" style="background-color: rgba(0,0,0,0.2);"></span>' +
                '<span class="close-jq-toast-single">×</span>' +
                '<h2 class="jq-toast-heading">Success !</h2>' +
                '<p>' + message + '</p>' +
                '</div></div>');

            // Append the notification to the body of the document
            $('body').append(successNotification);

            // Slide down the notification and fade it in
            successNotification.find('.jq-toast-single').slideDown().fadeIn();

            // Set a timeout function to remove the notification after 5 seconds
            setTimeout(function(){
                successNotification.fadeOut(function(){
                    $(this).remove();
                });
            }, 5000); // 5000 milliseconds = 5 seconds

            // Handle click event on the close button
            successNotification.find('.close-jq-toast-single').click(function(){
                // Fade out and remove the notification when close button is clicked
                successNotification.fadeOut(function(){
                    $(this).remove();
                });
            });
        }

        // Handle togglePermission function
    function togglePermission(value, columnName, userId) {
            var token = '{{ csrf_token() }}'; // Retrieve CSRF token
    var value = value.checked ? 1 : 0;
            $.ajax({
                type: 'POST',
                url: '{{ route("toggle.permission") }}',
                headers: {
                    'X-CSRF-TOKEN': token // Include CSRF token in headers
                },
                data: {
                    _token: token, // Also include CSRF token in data for Laravel's verification
                    user_id: userId,
                    class_id: $('#class_id').val(),
                    section_id: $('#section_id').val(),
                    subject_id: $('#subject_id').val(),
                    column_name: columnName,
                    value: value ? 1 : 0 
                },
                success: function(response) {
                    // Check if the success flag is true in the response
                    if (response.success) {
                        // Show success notification with the success message
                        showSuccessNotification('Permission updated successfully');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                }
            });
        }
</script>

