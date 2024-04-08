<form method="POST" class="d-block ajaxForm" action="{{ route('addPhotoToGallery', ['id' => $gallery->id]) }}" enctype="multipart/form-data">
@csrf
  <div class="form-row">
    <div class="form-group mb-1">
        <label for="addon_zip">Upload Gallery Photo</label> <br>
        <div class="custom-file-upload d-inline-block">
            <input type="file" class="form-control" id="gallery_photo" name="gallery_photo">
        </div>
    </div>

    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit">Save to Gallery</button>
    </div>
  </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllGalleryPhotos);
});
initCustomFileUploader();
</script>