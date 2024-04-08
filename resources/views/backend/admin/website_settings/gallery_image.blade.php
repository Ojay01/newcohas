@extends('backend.admin.website_settings.index')
@section('title', 'Image Gallery')

@section('settings')

<div class="gallery_photo_content">
  <div class="row ">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body py-2">
          <h4 class="page-title d-inline-block">
            <i class="mdi mdi-chart-timeline title_icon"></i> Title
          </h4>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="addPhotoModal()"> <i class="mdi mdi-plus"></i> Add Photo</button>
        </div> 
      </div> 
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
        @if ($gallery->images->count() > 0)
            <div class="row">
            @foreach ($gallery->images as $image)
                <div class="col-md-6 col-xl-3">
                  <div class="card d-block">
                    <img class="card-img-top" src="{{ asset('storage/app/public/' . $image->image) }}" alt="project image cap">
                    <div class="card-img-overlay">
                      <div style="float: right;">
                        <button type="button" class="btn btn-icon btn-warning btn-sm" onclick="confirmDelete('{{route('deleteImage', ['id' => $image->id])}}')"> <i class="mdi mdi-delete"></i> </button>
            </div>
                    </div>
                  </div>
                </div>
          @endforeach
            </div>
          @else
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    @include('backend.admin.empty')
                  </div>
                </div>
              </div>
            </div>
         @endif

        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal for Create Gallery -->
<div class="modal fade mt-3" id="addPhotoModal" tabindex="-1" aria-labelledby="addPhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPhotoModalLabel">Add Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.website_settings.add_photo') 
            </div>
        </div>
    </div>
</div>


<!-- Info Alert Modal -->
<div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Heads Up!</h4>
                    <p class="mt-3">Are you sure you want to delete this image?</p>
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
    function addPhotoModal() {
        $('#addPhotoModal').modal('show');
    }
    
</script>

<script type="text/javascript">
var showAllGalleryPhotos = function () {
   var url = '#';

   $.ajax({
      type : 'GET',
      url: url,
      success : function(response) {
         $('.gallery_photo_content').html(response);
      }
   });
}
</script>
@endsection