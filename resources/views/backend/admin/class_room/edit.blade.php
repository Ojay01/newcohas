<form method="POST" class="d-block ajaxForm" action="{{ route('classroom.edit', ['id' => $classroom->id]) }}">
@csrf
    <div class="form-row">
        <div class="form-group mb-1">
            <label for="name">Class Room Name</label>
            <input type="text" class="form-control" id="name" Value="{{ $classroom->name }}" name = "name" required>
            <small id="name_help" class="form-text text-muted">Provide Class Room Name</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Edit Class Room</button>
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