@extends('layouts.admin')
@section('title', 'Promote Students')
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
              @foreach ($sessions as $session)
              @if ($session->status == 1)
              <option value="{{$session->id}}">{{$session->name}}</option>
              @endif
              @endforeach
          </select>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
          <label for="session_to">Next Session</label>
          <select class="form-control select2" data-toggle = "select2" id = "session_to" name="session_to">
            <option value="">Session to</option>
            @foreach ($sessions as $session)
              @if ($session->status != 1)
              <option value="{{$session->id}}">{{$session->name}}</option>
              @endif
              @endforeach
        </select>
      </div>

      <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
        <label for="class_id_from">Promoting from</label>
        <select name="class_id_from" data-toggle = "select2" id="class_id_from" class="form-control" required>
          <option value="">Promoting from</option>
          @foreach ($classes as $class)
          <option value="{{$class->id}}">
            {{$class->name}}
          </option>
          @endforeach
      </select>
    </div>

    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
      <label for="class_id_to">Promoting to</label>
      <select name="class_id_to" class="form-control select2" data-toggle = "select2" id="class_id_to" required>
        <option value="">Promoting to</option>
        @foreach ($classes as $class)
          <option value="{{$class->id}}">
            {{$class->name}}
          </option>
          @endforeach
    </select>
  </div>

  <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
    <label for="manage_student" style="color: white;">Manage </label>
    <button type="button" class="btn btn-icon btn-secondary form-control" id = "manage_student" onclick="manageStudent()">Manage Promotion</button>
  </div>
</div>
<div class="table-responsive-sm student_to_promote_content">
@if ($class_id_from = '')
  @include('backend.admin.promotion.list')
@endif
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
    var classId = $('#class_id_from').val();
    var classIdTo = $('#class_id_to').val();
    var sessionFrom = $('#session_from').val();
    var sessionTo = $('#session_to').val();
    $.ajax({
        url: "{{ route('promoteStudents') }}",
        method: 'GET',
        data: {
            class_id: classId,
            class_id_to: classIdTo,
            session_from: sessionFrom,
            session_to: sessionTo,
        },
        success: function(response) {
            // Handle successful response here
              $('.student_to_promote_content').html(response);
        },
        error: function(xhr, status, error) {
            // Handle error here
            // console.error(xhr.responseText);
        }
    });
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