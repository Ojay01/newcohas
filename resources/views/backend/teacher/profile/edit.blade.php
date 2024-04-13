<div class="row justify-content-md-center">
    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update Profile</h4>
                <form method="POST" class="col-12 profileAjaxForm" action="{{ route('update_teacher_profile') }}" id="profileAjaxForm" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="name"> Name</label>
                            <div class="col-md-9">
                                <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="email">Email</label>
                            <div class="col-md-9">
                                <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="phone"> Phone Number</label>
                            <div class="col-md-9">
                                <input type="number" id="phone" name="phone" class="form-control" value="{{ Auth::user()->phone }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="address"> Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="address" name="address" rows="5" required>{{ Auth::user()->address }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="example-fileinput">Profile Image</label>
                            <div class="col-md-9 custom-file-upload">
                                <div class="wrapper-image-preview" style="margin-left: -6px;">
                                    <div class="box" style="width: 250px;"> 
                                        <div class="js--image-preview" style="background-image: url({{ asset('storage/app/public/profiles/' . Auth::user()->profile_image) }}); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="profile_image" class="btn"> <i class="mdi mdi-camera"></i> Upload an image </label>
                                            <input id="profile_image" reqiured style="visibility:hidden;" type="file" class="image-upload" name="profile_image" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateProfileInfo()">Update Profile</button>
                        </div>
                    </div>
                </form>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>

    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Change Password</h4>
                <form method="POST" class="col-12 changePasswordAjaxForm" action="{{ route('teacher.update_password') }}" id = "changePasswordAjaxForm" enctype="multipart/form-data">
                @csrf
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="current_password"> Current Password</label>
                            <div class="col-md-9">
                                <input type="password" id="current_password" placeholder="Current Password" name="current_password" class="form-control"  value="" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="new_password"> New Password</label>
                            <div class="col-md-9">
                                <input type="password" id="new_password" placeholder="New Password" name="password" class="form-control"  value="" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="confirm_password"> Confirm New Password</label>
                            <div class="col-md-9">
                                <input type="password" id="confirm_password" placeholder="Confirm New Password" name="password_confirmation" class="form-control"  value="" required>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="changePassword()">Change Password</button>
                        </div>
                    </div>
                </form>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</div>