@extends('backend.admin.website_settings.index')
@section('title', 'Gallery Setings')

@section('settings')

<div class="frontend_gallery_content">

  <div class="row">
    <div class="col-12 mb-2">
      <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" onclick="openCreateGalleryModal()"> <i class="mdi mdi-plus"></i> Create Gallery</button>

    </div>
          <!-- project card -->

          @if ($galleries->count() > 0)
          @foreach($galleries as $gallery)
        <div class="col-md-6 col-xl-4">
<div class="card d-block">
    <div class="card-body" style="height: 202px;">
        <div class="dropdown card-widgets">
            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="dripicons-dots-3"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editGallery{{ $gallery->id }}"><i
                        class="mdi mdi-pencil me-1"></i>edit</a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item"
                    onclick="confirmDelete('{{route('deleteGallery', ['id' => $gallery->id])}}')"><i class="mdi mdi-delete me-1"></i>delete</a>
            </div>
        </div>
        <!-- project title-->
        <h4 class="mt-0">
            <a href="{{route('galleryImageSettings', ['id' => $gallery->id])}}" class="text-title">{{$gallery->title}}</a>
        </h4>
        @if($gallery->show_on_website == 1)
        <div class="badge bg-success mb-3">visible</div>
        @else
        <div class="badge bg-danger mb-3">not visible</div>
        @endif

        <p class="text-muted font-13 mb-3">
            {{$gallery->description}}
        </p>
    </div> <!-- end card-body-->
    <ul class="list-group list-group-flush">
        <li class="list-group-item p-3">
            <div>
                @if(!empty($gallery->images))
                    @foreach($gallery->images->take(3) as $image)
                <a href="{{route('galleryImageSettings', ['id' => $gallery->id])}}" class="d-inline-block">
                    <img src="{{ asset('storage/app/public/' . $image->image) }}" class="rounded-circle avatar-xs" alt="image">
                </a>
            @endforeach
            @if($gallery->images->count() > 3)
                <a href="{{route('galleryImageSettings', ['id' => $gallery->id])}}" class="d-inline-block">+{{ $gallery->images->count() - 3 }} more</a>
            @endif
                @else
                    <span>No Photos Found</span>
                @endif
            </div>
        </li>
    </ul>
</div> <!-- end card-->
</div>

<!-- Modal for Edit Gallery -->
<div class="modal fade mt-3" id="editGallery{{ $gallery->id }}" tabindex="-1" aria-labelledby="editGalleryModalLabel" aria-hidden="true">
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
@endforeach
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

<script>
    function openCreateGalleryModal() {
        $('#createGalleryModal').modal('show');
    }

</script>

<!-- Info Alert Modal -->
<div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Heads Up!</h4>
                    <p class="mt-3">Are you sure you want to delete this Gallery?</p>
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