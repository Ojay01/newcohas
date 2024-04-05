<form method="POST" class="d-block ajaxForm" action="{{route('addClass')}}">
@csrf
    <div class="form-row">
        <div class="form-group mb-1">
            <label for="name">Class Name</label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted">Provide Class Name</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Create Class</button>
        </div>
    </div>
</form>

