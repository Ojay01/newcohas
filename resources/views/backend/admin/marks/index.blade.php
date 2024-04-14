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
                        @foreach ($exams as $exam)
                            <option value="{{$exam->id}}">{{$exam->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="class" id="class_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSection(this.value)">
                        <option value="">Select a Class</option>
                        @foreach ($classes as $class)
                            <option value="{{$class->id}}">
                                {{$class->name}}
                            </option>
                            @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="section" id="section_id" class="form-control select2" data-toggle = "select2" required>
                        <option value="">Select Section</option>
                                   @if ($class_id != "")
                            @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="subject" id="subject_id" class="form-control select2" data-toggle = "select2" required>
                    @foreach ($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="manageMarks()" >Filter</button>
                </div>
            </div>
                             
            <div class="card-body mark_content">
                  @if ($class_id != "")
        @include('backend.admin.marks.list')
            @else
                <div class="empty_box text-center">
                    <img class="mb-3" width="150px" src="/public/assets/backend/images/empty_box.png" />
                    <br>
                    <span class="">No Date Found</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
$('document').ready(function(){
    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id', '#exam_id', '#section_id', '#subject_id']);
});

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


function manageMarks(){
	var class_id = $('#class_id').val();
	var section_id = $('#section_id').val();
	var exam_id = $('#exam_id').val();
	var subject_id = $('#subject_id').val();
    $.ajax({
        url: "{{ route('admin.manageMarks') }}",
        method: 'GET',
        data: {
            class_id: class_id,
            section_id: section_id,
            exam_id: exam_id,
            subject_id: subject_id,
        },
        success: function(response) {
            // Handle successful response here
              $('.mark_content').html(response);
        },
        error: function(xhr, status, error) {
            // Handle error here
            // console.error(xhr.responseText);
        }
    });
}


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
</script>

@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection