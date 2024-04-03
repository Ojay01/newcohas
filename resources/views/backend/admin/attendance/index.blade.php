@extends('layouts.admin')
@section('title', 'Attendance Settings')
@section('content')

<!--title-->
<div class="row d-print-none">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-calendar-today title_icon"></i> Daily Attendance
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="opentakeAttendanceModal()"> <i class="mdi mdi-plus"></i> Take Attendance</button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="row mt-3 d-print-none">
        <div class="col-md-1 mb-1"></div>
        <div class="col-md-2 mb-1">
          <select name="month" id="month" class="form-control select2" data-bs-toggle="select2" required>
            <option value="">Select Month</option>
            <option value="January">{{('January')}}</option>
            <option value="February">{{('February')}}</option>
            <option value="March">{{('March')}}</option>
            <option value="April">{{('April')}}</option>
            <option value="May">{{('May')}}</option>
            <option value="June">{{('June')}}</option>
            <option value="July">{{('July')}}</option>
            <option value="August">{{('August')}}</option>
            <option value="September">{{('September')}}</option>
            <option value="October">{{('October')}}</option>
            <option value="November">{{('November')}}</option>
            <option value="December">{{('December')}}</option>
          </select>
        </div>
        <div class="col-md-2 mb-1">
          <select name="year" id="year" class="form-control select2" data-bs-toggle="select2" required>
            <option value="">Select a Year</option>
            <?php for($year = 2022; $year <= date('Y'); $year++){ ?>
              <option value="<?php echo $year; ?>"<?php if(date('Y') == $year) echo 'selected'; ?>><?php echo $year; ?></option>
            <?php } ?>

          </select>
        </div>
        <div class="col-md-2 mb-1">
          <select name="class" id="class_id" class="form-control select2" data-bs-toggle="select2" onchange="classWiseSection(this.value)" required>
            <option value="">Select a Class</option>

              <option value="#">
                Class Name
                11
              </option>

          </select>
        </div>
        <div class="col-md-2 mb-1">
          <select name="section" id="section_id" class="form-control select2" data-bs-toggle="select2" required>
            <option value="">Select Section</option>
          </select>
        </div>
        <div class="col-md-2">
          <button class="btn btn-block btn-secondary" onclick="filter_attendance()" >Filter</button>
        </div>
      </div>

      <div class="card-body attendance_content">
        <div class="empty_box text-center">
          <img class="mb-3" width="150px" src="/public/assets/backend/images/empty_box.png" />
          <br>
          <span class="">No Data Found</span>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal for take Attendance -->
<div class="modal fade mt-3" id="takeAttendanceModal" tabindex="-1" aria-labelledby="takeAttendanceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="takeAttendanceModalLabel">Take Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.attendance.take_attendance') 
            </div>
        </div>
    </div>
</div>

<script>
    function opentakeAttendanceModal() {
        $('#takeAttendanceModal').modal('show');
    }
</script>

<script>
$('document').ready(function(){
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#month', '#year', '#class_id', '#section_id']);
});

function classWiseSection(classId) {
  $.ajax({
    url: "#",
    success: function(response){
      $('#section_id').html(response);
    }
  });
}

function filter_attendance(){
  var month = $('#month').val();
  var year = $('#year').val();
  var class_id = $('#class_id').val();
  var section_id = $('#section_id').val();
  if(class_id != "" && section_id != "" && month != "" && year != ""){
    getDailtyAttendance();
  }else{
    toastr.error('#');
  }
}

var getDailtyAttendance = function () {
  var month = $('#month').val();
  var year = $('#year').val();
  var class_id = $('#class_id').val();
  var section_id = $('#section_id').val();
  if(class_id != "" && section_id != "" && month != "" && year != ""){
    $.ajax({
      type: 'POST',
      url: '#',
      data: {month : month, year : year, class_id : class_id, section_id : section_id},
      success: function(response){
        $('.attendance_content').html(response);
        initDataTable('basic-datatable');
      }
    });
  }
}
</script>

@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection