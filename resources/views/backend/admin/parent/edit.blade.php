<form method="POST" class="d-block ajaxForm" action="#">
@csrf
    <div class="form-row">
        <div class="form-group mb-1">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="" class="form-text text-muted">Provide Name</small>
        </div>

        <div class="form-group mb-1">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name = "email" required>
            <small id="" class="form-text text-muted">Provide Email</small>
        </div>

        <div class="form-group mb-1">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name = "password" required>
            <small id="" class="form-text text-muted">Provide Password</small>
        </div>

        <div class="form-group mb-1">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name = "phone" required>
            <small id="" class="form-text text-muted">Provide Phone Number</small>
        </div>

        <div class="form-group mb-1">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control select2" data-toggle = "select2">
                <option value="">Select a Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <small id="" class="form-text text-muted">Provide Gender</small>
        </div>


        <div class="form-group mb-1">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name = "address" rows="5" required></textarea>
            <small id="" class="form-text text-muted">Provide Address</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Edit Parent</button>
        </div>
    </div>
</form>

<script>
$(document).ready(function () {
    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#gender', '#blood_group']);
});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllParents);
});
</script>