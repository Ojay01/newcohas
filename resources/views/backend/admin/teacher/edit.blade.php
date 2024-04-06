<form method="POST" class="d-block ajaxForm" action="#" enctype="multipart/form-data">
@csrf
    <div class="form-row">
        <div class="form-group mb-1">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="{{$teacher->user->name}}" id="name" name = "name" required>
            <small id="" class="form-text text-muted">Provide Teacher Name</small>
        </div>

        <div class="form-group mb-1">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" value="{{$teacher->user->email}}" name = "email" required>
            <small id="" class="form-text text-muted">Provide Teacher Email</small>
        </div>


        <div class="form-group mb-1">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" id="designation" value="{{$teacher->designation}}" name = "designation" required>
            <small id="" class="form-text text-muted">Teacher's Designation</small>
        </div>

        <div class="form-group mb-1">
            <label for="department">Departments</label>
            <select name="department" id="department" class="form-control " required>
                <option value="">Select Department</option>
                    <option value="#">Departments</option>
            </select>
            <small id="" class="form-text text-muted">Provide Department</small>
        </div>

        <div class="form-group mb-1">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" value="{{$teacher->user->phone}}" name = "phone" required>
            <small id="" class="form-text text-muted">Provide teacher Phone Number</small>
        </div>

        <div class="form-group mb-1">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control ">
                <option value="">Select Gender</option>
               <option value="Male" @if($teacher->user->gender == 'Male') selected @endif>Male</option>
                 <option value="Female" @if($teacher->user->gender == 'Female') selected @endif>Female</option>
            </select>
            <small id="" class="form-text text-muted">Provide Teacher Gender</small>
        </div>


        <div class="form-group mb-1">
            <label>Facebook Profile Link</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                </div>
                <input type="text" class="form-control" name="facebook_link" value="{{ $socialLinks[$teacher->id]['facebook'] ?? '' }}">
            </div>
            <small id="" class="form-text text-muted">Facebook profile Link</small>
        </div>

        <div class="form-group mb-1">
            <label>X profile Link</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                </div>
                <input type="text" class="form-control" name="twitter_link" value="{{ $socialLinks[$teacher->id]['twitter'] ?? '' }}" >
            </div>
            <small id="" class="form-text text-muted">X profile link</small>
        </div>

        <div class="form-group mb-1">
            <label>LinkedIn Profile Link</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
                </div>
                <input type="text" class="form-control" name="linkedin_link" value="{{ $socialLinks[$teacher->id]['linkedin'] ?? '' }}" >
            </div>
            <small id="" class="form-text text-muted">Provide LinkedIn profile Link</small>
        </div>

        <div class="form-group mb-1">
            <label for="phone">Address</label>
            <textarea class="form-control" id="address" name = "address" rows="5" required> {{$teacher->user->address}} </textarea>
            <small id="" class="form-text text-muted">Provide Teacher's Address</small>
        </div>

        <div class="form-group mb-1">
            <label for="about">About</label>
            <textarea class="form-control" id="about" value="{{$teacher->about}}" name = "about" rows="5" required></textarea>
            <small id="" class="form-text text-muted">Provide an About</small>
        </div>

        <div class="form-group mb-1">
          <label for="show_on_website">Show on Website</label>
          <select name="show_on_website" id="show_on_website" class="form-control " >
           <option value="1" @if($teacher->show_on_website == 1) selected @endif>Show on Website</option>
            <option value="0" @if($teacher->show_on_website == 0) selected @endif>No need to Show</option>
          </select>
          <small id="" class="form-text text-muted">Show on Website</small>
        </div>

        <div class="form-group mb-1">
            <label for="image_file">Upload Photo</label>
            <input type="file" class="form-control" id="image_file" name = "image_file">
        </div>

        <div class="form-group mt-2 col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Update Teacher</button>
        </div>
    </div>
</form>

<script>
$(document).ready(function () {
    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#department', '#gender', '#blood_group', '#show_on_website']);
});


$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllTeachers);
});

// initCustomFileUploader();
</script>