@extends('layouts.admin')
@section('title', 'Permission Settings')
@section('content')

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-account-multiple-check title_icon"></i> Assign Permission to teacher
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row mt-3">
                <div class="col-md-1"></div>
                <div class="col-md-2 mb-1">
                    <select name="class" id="class_id" class="form-control select2" data-toggle = "select2" onchange="classWiseSection(this.value)" required>
                        <option value="">Select a Class</option>
                           
                                <option value="#">
                                    Name
                                    55
                                </option>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="section" id="section_id" class="form-control select2" data-toggle = "select2"  required>
                        <option value="">Section</option>
                    </select>
                </div>
                 <div class="col-md-2 mb-1">
                    <select name="subject" id="subject_id" class="form-control select2" data-toggle = "select2" required>
                        <option value="">Subject</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="filter()" >Filter</button>
                </div>
            </div>

    @include('backend.admin.permission.list')

            <div class="card-body permission_content">
            	<div class="empty_box text-center">
                    <img class="mb-3" width="150px" src="/public/assets/backend/images/empty_box.png" />
                    <br>
                    <span class="">No Data Found</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modyfy section -->
<script>
    $('document').ready(function(){

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
    function filter(){
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var subject_id = $('#subject_id').val();
    
    // Display selected IDs
    $('#selected_class_id').text(class_id);
    $('#selected_section_id').text(section_id);
    $('#selected_subject_id').text(subject_id);

        if(class_id != "" && section_id!= "" && subject_id!= ""){
            $.ajax({
                url: '#',
                success: function(response){
                    $('.permission_content').html(response);
                }
            });
        }else{
            toastr.error('#');
        }
    }
</script>

<!-- permission insert and update -->
<script>
    function togglePermission(checkbox_id, column_name, teacher_id){

        var value = $('#'+checkbox_id).val();
        if(value == 1){
            value = 0;
        }else{
            value = 1;
        }
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();

        $.ajax({
            type: 'POST',
            url: '#',
            data: {class_id : class_id, section_id : section_id, teacher_id : teacher_id, column_name : column_name,  value : value},
            success: function(response){
                $('.permission_content').html(response);
                success_notify('#');
            }
        });

    }
</script>

@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection