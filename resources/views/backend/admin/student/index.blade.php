@extends('layouts.admin')
@section('title', 'Student ')
@section('content')

    <!--title-->
    <div class="row d-print-none">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body py-2">
                    <h4 class="page-title d-inline-block">
                        <i class="mdi mdi-calendar-today title_icon"></i> Student
                    </h4>
                    <a href="{{route('singleAdmission')}}" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1"> <i class="mdi mdi-plus"></i> Add New Student</a>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    <div class="row d-print-none">
        <div class="col-12">
            <div class="card ">
                <div class="row mt-3">
                    <div class="col-md-1 mb-1"></div>
                    <div class="col-md-4 mb-1">
                        <select name="class" id="class_id" class="form-control " required onchange="classWiseSection(this.value)">
                            <option value="">Class Name</option>
                                <option value="#"selected>
                                    Class Name
                                    99
                                </option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-1">
                        <select name="section" id="section_id" class="form-control " required>
                                    <option value="#" >Section Name</option>
                              
                                <option value="">Select Section</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-block btn-secondary" onclick="filter_student()" >Filter</button>
                    </div>
                </div>
                <div class="card-body student_content">
                      @include('backend.admin.student.list')
               
                        <div class="empty_box text-center">
                             <img class="mb-3" width="150px" src="/public/assets/backend/images/empty_box.png" />
                            <br>
                            <span class="">No Data Found</span>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>



<script>
$('document').ready(function(){

});

function classWiseSection(classId) {
    $.ajax({
        url: "#",
        success: function(response){
            $('#section_id').html(response);
        }
    });
}

function filter_student(){
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    if(class_id != "" && section_id!= ""){
        showAllStudents();
    }else{
        toastr.error('#');
    }
}

var showAllStudents = function() {
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    if(class_id != "" && section_id!= ""){
        $.ajax({
            url: '#',
            success: function(response){
                $('.student_content').html(response);
            }
        });
    }
}
</script>

@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')

@endsection