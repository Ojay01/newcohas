<form method="POST" class="d-block ajaxForm" action="{{route('academic.year.create')}}">
@csrf
    <div class="form-row">
        <div class="form-group mb-1">
            <label for="name">Academic Year</label>
            <input type="text" class="form-control" id="name" name = "name" required placeholder="2022-2023">
            <small id="name_help" class="form-text text-muted">Provide Academic Year</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Create Academic Year</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllSessions);
    });
</script>