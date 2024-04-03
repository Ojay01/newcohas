<form method="POST" class="d-block ajaxForm" action="#">
@csrf
  <div class="form-row">
    <div class="form-group mb-1">
      <label for="title">Event Title</label>
      <input type="text" class="form-control" id="title" name = "title" required>
      <small id="name_help" class="form-text text-muted">Provide tile name</small>
    </div>
    <div class="form-group mb-1">
      <label for="starting_date">Event Starting Date</label>
      <input type="text" value="<?php echo date('m/d/Y'); ?>" class="form-control" id="starting_date" name = "starting_date" data-provide = "datepicker" required>
      <small id="name_help" class="form-text text-muted">Provide Starting Date</small>
    </div>

    <div class="form-group mb-1">
      <label for="starting_date">Event Ending Date</label>
      <input type="text" value="<?php echo date('m/d/Y'); ?>" class="form-control" id="ending_date" name = "ending_date" data-provide = "datepicker" required>
      <small id="name_help" class="form-text text-muted">Provide Ending date</small>
    </div>

    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit">Save Event</button>
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
</script>