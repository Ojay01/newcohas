@extends('backend.admin.website_settings.index')
@section('title', 'Gallery Setings')

@section('settings')

<div class="frontend_gallery_content">

  <div class="row">
    <div class="col-12 mb-2">
      <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="openCreateGalleryModal()"> <i class="mdi mdi-plus"></i> Create Gallery</button>

    </div>
        <div class="col-md-6 col-xl-4">
          <!-- project card -->
          <div class="card d-block">
            <div class="card-body" style="height: 202px;">
              <div class="dropdown card-widgets">
                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="dripicons-dots-3"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item" onclick="openEditGalleryModal()"><i class="mdi mdi-pencil me-1"></i>edit</a>
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('#', showAllGallery)"><i class="mdi mdi-delete me-1"></i>delete</a>
                </div>
              </div>
              <!-- project title-->
              <h4 class="mt-0">
                <a href="{{route('galleryImageSettings')}} " class="text-title">Title</a>
              </h4>
             
                  <div class="badge bg-success mb-3">visible</div>
              
                  <div class="badge bg-danger mb-3">not visible</div>
            

              <p class="text-muted font-13 mb-3">
                Description
              </p>
            </div> <!-- end card-body-->
            <ul class="list-group list-group-flush">
              <li class="list-group-item p-3">
                <div>
                  
                        <a href="#" class="d-inline-block">
                          <img src="#" class="rounded-circle avatar-xs" alt="friend">
                        </a>
                      
                    
                      <a href="#" class="d-inline-block text-muted font-weight-bold ms-2">
                        more
                      </a>
                 
                 
                    <span>No Photos Found</span>
                  
                </div>
              </li>
            </ul>
          </div> <!-- end card-->
        </div>
      
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              @include('backend.admin.empty')
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

<!-- Modal for Create Gallery -->
<div class="modal fade mt-3" id="createGalleryModal" tabindex="-1" aria-labelledby="createGalleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createGalleryModalLabel">Create Gallery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.website_settings.create_gallery') 
            </div>
        </div>
    </div>
</div>
<!-- Modal for Edit Gallery -->
<div class="modal fade mt-3" id="editGalleryModal" tabindex="-1" aria-labelledby="editGalleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGalleryModalLabel">Edit Gallery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.website_settings.edit_gallery') 
            </div>
        </div>
    </div>
</div>
<script>
    function openCreateGalleryModal() {
        $('#createGalleryModal').modal('show');
    }
    function openEditGalleryModal() {
        $('#editGalleryModal').modal('show');
    }
</script>


<script type="text/javascript">
var showAllGallery = function () {
   var url = '#';

   $.ajax({
      type : 'GET',
      url: url,
      success : function(response) {
         $('.frontend_gallery_content').html(response);
      }
   });
}
</script>

@endsection