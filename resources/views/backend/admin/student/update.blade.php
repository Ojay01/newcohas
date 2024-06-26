@extends('layouts.admin')
@section('title', 'Edit Student Settings')
@section('content')

<!--title-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">
                <i class="mdi mdi-update title_icon"></i> Update Student Form
            </h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card pt-0">
            <div class="card-body">
                <h4 class="text-center mx-0 py-2 mt-0 mb-3 px-0 text-white bg-primary">Update Student Information</h4>
                <form method="POST" class="col-12 d-block ajaxForm" action="#" id = "student_update_form" enctype="multipart/form-data">
                @csrf
                    <div class="col-md-12">
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="name">Name</label>
                            <div class="col-md-9">
                                <input type="text" id="name" name="name" class="form-control"  value="{{$user->name}}" placeholder="name" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="email">Email</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="email" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="parent_id">Parent</label>
                            <div class="col-md-9">
                                <select id="parent_id" name="parent_id" class="form-control select2"  data-bs-toggle="select2" required >
                                    <option value="">Select A Parent</option>
                                        <option value="#" >Name</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="class_id">Class</label>
                            <div class="col-md-9">
                                <input type="text" id="class_name" name="class_id" class="form-control" value="{{ $user->enrollment->class->name  }}" placeholder="Class Name" required readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="section_id">Sections</label>
                            <div class="col-md-9" id = "section_content">
                                 <input type="text" id="class_name" name="section_id" class="form-control" value="{{ $user->enrollment->section->name  }}" placeholder="Class Name" required readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="birthdatepicker">Birthday</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control date" id="birthdatepicker" data-bs-toggle="date-picker" data-single-date-picker="true" name = "birthday"  value="{{$user->birthday}}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="gender">Gender</label>
                            <div class="col-md-9">
                                <select name="gender" id="gender" class="form-control select2"  data-bs-toggle="select2" required>
                                    <option value="">Select Gender</option>
                                    <option value="M" @if($user->gender == 'M') selected @endif>Male</option>
                                    <option value="F" @if($user->gender == 'F') selected @endif>Female</option>

                                </select>
                            </div>
                        </div>


                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="example-textarea">Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="example-textarea" rows="5" name = "address" placeholder="address">{{$user->address}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="phone">Phone</label>
                            <div class="col-md-9">
                                <input type="text" id="phone" name="phone" class="form-control" value="{{$user->phone}}" placeholder="phone" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="example-fileinput">Student Profile Image</label>
                            <div class="col-md-9 custom-file-upload">
                                <div class="wrapper-image-preview" style="margin-left: -6px;">
                                    <div class="box" style="width: 250px;">
                                    @if($user->profile_image)
                                        <div class="js--image-preview" style="background-image: url({{ asset('storage/app/public/profiles/' . $user->profile_image) }}); background-color: #F5F5F5;"></div>
                     @else
                             <div class="js--image-preview" style="background-image: url({{ asset('/public/images/placeholder.jpg')}}); background-color: #F5F5F5;"></div>
                        @endif
                                        <div class="upload-options">
                                            <label for="student_image" class="btn"> <i class="mdi mdi-camera"></i> Upload Image </label>
                                            <input id="student_image" style="visibility:hidden;" type="file" class="image-upload" name="student_image" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary col-md-4 col-sm-12 mb-4">Update Student Information</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
var form;
$(".ajaxForm").submit(function(e) {
    form = $(this);
    ajaxSubmit(e, form, refreshForm);
});
var refreshForm = function () {

}

function classWiseSectionOnStudentEdit(classId) {
    $.ajax({
        url: "#",
        success: function(response){
            $('#section_id').html(response);
        }
    });
}
</script>

@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection