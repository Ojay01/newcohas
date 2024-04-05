@foreach ($class->sections as $section)
    <form method="POST" class="d-block ajaxForm" action="{{ route('sections.destroy', $section) }}">
        @csrf
        @method('DELETE')
        <div class="input-group me-2 mb-2" id="sectionDatabase{{ $section->id }}">
            <input type="text" readonly class="form-control" name="name" value="{{ $section->name }}" required>
            <button class="btn btn-icon btn-danger delete-section" type="button" data-url="{{ route('sections.destroy', $section) }}"><i class="mdi mdi-window-close"></i></button>
        </div>
    </form>
@endforeach

<div id="section_area"></div> <hr>

<form method="POST" class="d-block ajaxForm" action="{{ route('sections.store', $class->id) }}">
    @csrf
    <input type="hidden" name="class_id" value="{{ $class->id }}">
    <div class="input-group me-2 mb-2">
        <input type="text" class="form-control" id="name" name="name" value="" placeholder="Add Section" required>
        <button class="btn btn-icon btn-success" type="submit"><i class="mdi mdi-plus"></i></button>
    </div>
</form>

<!-- Info Alert Modal -->
<div id="alert-modal-redirect" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Heads Up!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Cancel</button>
                    <a href="" id="alert-modal-redirect-url" class="btn btn-danger my-2">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
$(document).ready(function() {
    $('.delete-section').click(function() {
        var url = $(this).data('url');
        $('#alert-modal-redirect-url').attr('data-url', url); // Set data-url attribute
        $('#alert-modal-redirect').modal('show');
    });

    // Handle click on "Continue" button in the modal
    $('#alert-modal-redirect-url').click(function() {
        var url = $(this).attr('data-url'); // Get the URL from data-url attribute
        $.ajax({
            url: url,
            type: 'DELETE', // Send a DELETE request
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
            },
            success: function(response) {
                // Handle success response
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
            }
        });
    });
});
</script>

