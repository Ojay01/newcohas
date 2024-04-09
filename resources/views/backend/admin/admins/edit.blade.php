<form method="POST" class="d-block ajaxForm" action="#">
@csrf
    <div class="form-row">
        <div class="form-group mb-1">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name = "name" value="{{$admin->name}}" required>
            <small id="" class="form-text text-muted">Provide Admin Name</small>
        </div>

        <div class="form-group mb-1">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name = "email" value="{{$admin->email}}" required>
            <small id="" class="form-text text-muted">Provide Admin Email</small>
        </div>

        <div class="form-group mb-1">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name = "phone" value="{{$admin->phone}}" required>
            <small id="" class="form-text text-muted">Provide Admin Number</small>
        </div>


        <div class="form-group mb-1">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control ">
                <option value="">Select a Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Email</option>
            </select>
            <small id="" class="form-text text-muted">Provide Admin Gender</small>
        </div>


        <div class="form-group mb-1">
            <label for="phone">Address</label>
            <textarea class="form-control" id="address" name = "address" rows="5" required> {{$admin->address}}</textarea>
            <small id="" class="form-text text-muted">Provide Admin Address</small>
        </div>

        <div class="form-group mt-2 col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Edit Admin</button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); });
    });
    

    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllAdmins);
    });
</script>