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
                           
                                @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="section" id="section_id" class="form-control select2" data-toggle = "select2"  required>
        <option value="" >Select Section</option> <!-- Default option -->
                       @if ($class_id != "")
            @foreach ($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
            @endforeach
        @endif
                    </select>
                </div>
                <div class="col-md-2 mb-1" id="subject_select_wrapper" style="display: none;">
    <select name="subject" id="subject_id" class="form-control select2" data-toggle="select2" required>
        <option value="">Select Subject</option>
        @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
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

<script>
function classWiseSection(classId) {
    var classId = $('#class_id').val(); // Get the selected class ID
 if (!classId) {
        $('#section_id').empty(); // Clear existing options
        $('#section_id').append($('<option>', { value: '', text: 'No Section Found' })); // Add default option
        return; // Exit the function
    }
    $.ajax({
        url: "{{ route('section.list', ['class_id' => ':class_id']) }}".replace(':class_id', classId),
        success: function(response){
            $('#section_id').empty(); // Clear existing options
            $.each(response, function (index, section) {
                $('#section_id').append($('<option>', { value: section.id, text: section.name }));
            });
             $('#subject_select_wrapper').show(); 
        }
    });
}

function fetchStudents() {
    var classId = $('#class_id').val();
    var sectionId = $('#section_id').val();
    $.ajax({
        url: "{{ route('filterStudents') }}",
        method: 'GET',
        data: {
            class_id: classId,
            section_id: sectionId
        },
        success: function(response) {
            // Handle successful response here
              $('.student_content').html(response);
        },
        error: function(xhr, status, error) {
            // Handle error here
            // console.error(xhr.responseText);
        }
    });
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