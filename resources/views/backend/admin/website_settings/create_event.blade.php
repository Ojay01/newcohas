<form method="POST" class="d-block ajaxForm" action="#">
@csrf
  <div class="form-row">
    <div class="form-group mb-1">
      <label for="title">Event Title</label>
      <input type="text" class="form-control" id="title" name = "title" required>
      <small id="name_help" class="form-text text-muted">Provide Title Name</small>
    </div>
    <div class="form-group mb-1">
      <label for="timestamp">Date</label>
      <input type="text" value="<?php echo date('m/d/Y'); ?>" class="form-control" id="timestamp" name = "timestamp" data-provide = "datepicker" required>
      <small id="name_help" class="form-text text-muted">Provide Date</small>
    </div>

    <div class="form-group mb-1">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
        <small id="" class="form-text text-muted">Visibility On Website</small>
    </div>

    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit">Create Event</button>
    </div>
  </div>
</form>

<script>
$(document).ready(function() {

});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllEvents);
});

$('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#status']);
</script>
