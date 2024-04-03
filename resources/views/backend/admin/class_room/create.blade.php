<form method="POST" class="d-block ajaxForm" action="#">
@csrf
    <div class="form-row">
        <input type="hidden" name="school_id" value="#">
        <div class="form-group mb-1">
            <label for="name">Class Room Name</label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted">Provide Class Room Name</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Create Class Room</button>
        </div>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllClassRooms);
});
</script>