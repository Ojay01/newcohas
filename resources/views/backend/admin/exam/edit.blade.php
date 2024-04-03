<form method="POST" class="d-block ajaxForm" action="#">
@csrf
    <div class="form-row">
        <div class="form-group mb-1">
            <label for="exam_name">Exam Name</label>
            <input type="text" class="form-control" id="exam_name" name = "exam_name" placeholder="name" required>
            <small id="name_help" class="form-text text-muted">Provide Exam Name</small>
        </div>

        <div class="form-group mb-1">
            <label for="starting_date">Starting Date</label>
            <input type="text" class="form-control date" id="starting_date" data-bs-toggle="date-picker" data-single-date-picker="true" name = "starting_date" value="#" required>
            <small id="name_help" class="form-text text-muted">Provide Starting Date</small>
        </div>

        <div class="form-group mb-1">
            <label for="ending_date">Ending Date</label>
            <input type="text" class="form-control date" id="ending_date" data-bs-toggle="date-picker" data-single-date-picker="true" name = "ending_date"   value="#" required>
            <small id="name_help" class="form-text text-muted">Provide Ending Date</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Update Exam</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllExams);
    });
    $("#starting_date" ).daterangepicker();
    $("#ending_date" ).daterangepicker();
</script>