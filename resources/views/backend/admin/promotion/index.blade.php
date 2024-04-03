@extends('layouts.admin')
@section('title', 'Teacher Settings')
@section('content')

<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title">
          <i class="mdi mdi-account-switch title_icon"></i>Student Promotion
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end page title -->

<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">

        <div class="row justify-content-md-center d-print-none" style="margin-bottom: 10px;">
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <label for="session_from">Current Session</label>
            <select class="form-control select2" data-toggle = "select2" id = "session_from" name="session_from">
              <option value="">Session from</option>
              <option value="#">session Name</option>
          </select>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
          <label for="session_to">Next Session</label>
          <select class="form-control select2" data-toggle = "select2" id = "session_to" name="session_to">
            <option value="">Session to</option>
            <option value="#">session name</option>
        </select>
      </div>

      <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
        <label for="class_id_from">Promoting from</label>
        <select name="class_id_from select2" data-toggle = "select2" id="class_id_from" class="form-control" required>
          <option value="">Promoting from</option>
          <option value="#">
            Class Name
            22
          </option>
      </select>
    </div>

    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
      <label for="class_id_to">Promoting to</label>
      <select name="class_id_to" class="form-control select2" data-toggle = "select2" id="class_id_to" required>
        <option value="">Promoting to</option>
        <option value="#">class name</option>
    </select>
  </div>

  <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
    <label for="manage_student" style="color: white;">Manage </label>
    <button type="button" class="btn btn-icon btn-secondary form-control" id = "manage_student" onclick="manageStudent()">Manage Promotion</button>
  </div>
</div>

<div class="table-responsive-sm student_to_promote_content">
  @include('backend.admin.promotion.list')
</div>
</div> <!-- end card body-->
</div> <!-- end card -->
</div><!-- end col-->
</div>

<script type="text/javascript">
$('document').ready(function(){
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#session_from', '#session_to', '#class_id_from', '#class_id_to']);
});

function manageStudent() {
  var session_from   = $('#session_from').val();
  var session_to     = $('#session_to').val();
  var class_id_from  = $('#class_id_from').val();
  var class_id_to    = $('#class_id_to').val();
  if(session_from > 0 && session_to > 0 && class_id_from > 0 && class_id_to > 0 ) {
    var url = '#';
    $.ajax({
      type : 'POST',
      url: url,
      data : { session_from : session_from, session_to : session_to, class_id_from : class_id_from, class_id_to : class_id_to, _token : '{{ @csrf_token() }}' },
      success : function(response) {
        $('.student_to_promote_content').html(response);
      }
    });
  }else {
    toastr.error('#');
  }
}

function enrollStudent(promotion_data, enroll_id) {
  $.ajax({
    type : 'get',
    url: '#',
    success : function(response) {
      if (response) {
        $("#success_"+enroll_id).show();
        $("#danger_"+enroll_id).hide();
        success_notify('#');
      }else{
        toastr.error('#');
      }
    }
  });
}
</script>

@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection