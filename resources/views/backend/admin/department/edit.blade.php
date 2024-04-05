<form method="POST" class="d-block ajaxForm" action="{{ route('department.update', ['department_id' => $department->id]) }}">
@csrf
    <div class="form-row">
        <div class="form-group mb-1">
            <label for="name">Department Name</label>
            <input type="text" class="form-control" value="{{$department->name}}" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted">Provide department name</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Update Department</button>
        </div>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllDepartments);
});
</script>

