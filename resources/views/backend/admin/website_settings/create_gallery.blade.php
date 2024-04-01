<form method="POST" class="d-block ajaxForm" action="#">
@csrf
  <div class="form-row">
    <div class="form-group mb-1">
      <label for="title">Gallery Title</label>
      <input type="text" class="form-control" id="title" name = "title" required>
      <small id="name_help" class="form-text text-muted">Title Name</small>
    </div>

    <div class="form-group mb-1">
      <label for="title">Description</label>
      <textarea name="description" class="form-control" rows="8" cols="80" required></textarea>
      <small id="description_help" class="form-text text-muted">Description</small>
    </div>

    <div class="form-group mb-1">
      <label class="col-form-label" for="date_added">Date</label>
      <input type="text" class="form-control date" id="date_added" data-bs-toggle="date-picker" data-single-date-picker="true" name = "date_added"   value="#" required>
    </div>

    <div class="form-group mb-1">
        <label for="show_on_website">Show on Website</label>
        <select name="show_on_website" id="show_on_website" class="form-control select2" data-toggle = "select2">
            <option value="1">show</option>
            <option value="0">Do Not Show</option>
        </select>
        <small id="" class="form-text text-muted">Visibility on Website</small>
    </div>

    <div class="form-group mb-1">
        <label for="cover_image">Cover Image</label>
        <div class="custom-file-upload d-inline-block">
            <input type="file" class="form-control" id="cover_image" name = "cover_image" required>
        </div>
    </div>

    <div class="form-group  col-md-12">
      <button class="btn d-block btn-primary mt-5" type="submit">Save Gallery</button>
    </div>
  </div>
</form>

<script>
$(document).ready(function() {

});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllGallery);
});

$('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#show_on_website']);
initCustomFileUploader();
$("#date_added").daterangepicker();
</script>