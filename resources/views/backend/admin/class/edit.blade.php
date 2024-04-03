<form method="POST" class="d-block ajaxForm" action="#">
@csrf
    <div class="form-row">
        <div class="form-group mb-1">
            <label for="name">Class Name</label>
            <input type="text" class="form-control" value="#" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted">Provide Class Name</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Update Class</button>
        </div>
    </div>
</form>

<script>
  $(".ajaxForm").validate({}); // Jquery form validation initialization
  $(".ajaxForm").submit(function(e) {
      var form = $(this);
      ajaxSubmit(e, form, showAllClasses);
  });
</script>