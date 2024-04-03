@extends('layouts.admin')
@section('title', 'Marks')
@section('content')

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-format-list-numbered title_icon"></i> Manage Marks
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row mt-3">
                <div class="col-md-1 mb-1"></div>
                <div class="col-md-2 mb-1">
                    <select name="exam" id="exam_id" class="form-control select2" data-toggle = "select2" required>
                        <option value="">Select an Exam</option>
                            <option value="#">Exam Name</option>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="class" id="class_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSection(this.value)">
                        <option value="">Select a Class</option>
                            <option value="#">
                                Class Name
                               12
                            </option>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="section" id="section_id" class="form-control select2" data-toggle = "select2" required>
                        <option value="">Select Section</option>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="subject" id="subject_id" class="form-control select2" data-toggle = "select2" required>
                        <option value="">Select Subject</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="filter_attendance()" >Filter</button>
                </div>
            </div>

        @include('backend.admin.marks.list')

            <div class="card-body mark_content">
                <div class="empty_box text-center">
                    <img class="mb-3" width="150px" src="/public/assets/backend/images/empty_box.png" />
                    <br>
                    <span class="">No Date Found</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$('document').ready(function(){
    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id', '#exam_id', '#section_id', '#subject_id']);
});

function classWiseSection(classId) {
    $.ajax({
        url: "#",
        success: function(response){
            $('#section_id').html(response);
            classWiseSubject(classId);
        }
    });
}

function classWiseSubject(classId) {
    $.ajax({
        url: "#",
        success: function(response){
            $('#subject_id').html(response);
        }
    });
}

function filter_attendance(){
    var exam = $('#exam_id').val();
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    var subject = $('#subject_id').val();
    if(class_id != "" && section_id != "" && exam != "" && subject != ""){
        $.ajax({
            type: 'POST',
            url: '#',
            data: {class_id : class_id, section_id : section_id, subject : subject, exam : exam},
            success: function(response){
                $('.mark_content').html(response);
            }
        });
    }else{
        toastr.error('#');
    }
}
</script>

@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection