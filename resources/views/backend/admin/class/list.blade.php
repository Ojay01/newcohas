
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
               @forelse ($classes as $class)
        <tr>
            <td>{{ $class->name }}</td>
            <td>
                @if ($class->sections ?? null)
                <ul>
                    @foreach ($class->sections as $section)
                    <li>{{ $section->name }}</li>
                    @endforeach
                </ul>
                @else
                No sections
                @endif
            </td>
                <td>
                    <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createSectionsModal{{ $class->id }}">Sections</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal{{ $class->id }}">Edit</a>
                            <!-- item-->
                            <button class="dropdown-item delete-class" data-url="{{ route('classes.destroy', $class) }}">Delete</button>
                        </div>
                    </div>
                </td>
            </tr>

            <div class="modal fade mt-3" id="editModal{{ $class->id }}" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
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

<div class="modal fade mt-3" id="createSectionsModal{{ $class->id }}" tabindex="-1" aria-labelledby="createSectionsModal" aria-hidden="true">
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


             @empty
@include('backend.admin.empty')

           @endforelse
    </tbody>
</table>
<!-- Info Alert Modal -->
<div id="class_delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Heads Up!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Cancel</button>
                    <a href="" id="class_delete-url" class="btn btn-danger my-2">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <script>
    $(document).ready(function() {
    // Handle click on delete button
    $('.delete-class').click(function() {
        var url = $(this).data('url');
        $('#class_delete-url').attr('href', url); // Set href attribute
        $('#class_delete').modal('show');
    });

    // Handle click on "Continue" button in the modal
    $('#class_delete-url').click(function(e) {
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
