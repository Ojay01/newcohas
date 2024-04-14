@extends('layouts.teacher')
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
                    <select name="class" id="class_id" class="form-control  select2" data-toggle = "select2" required onchange="classWiseSection()">
                        <option value="" >Select Class</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
               <div class="col-md-4 mb-1">
    <select name="section" id="section_id" class="form-control select2" data-toggle="select2" required>
        <option value="" >Select Section</option> <!-- Default option -->

        @if ($class_id != "")
            @foreach ($sections as $section)
                
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
               
            @endforeach
        @endif
    </select>
</div>

                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="fetchStudents()">Filter</button>
                </div>

                <div class="card-body student_content">
        @if ($class_id !== "")  
                      @include('backend.teacher.student.list')
               @else
                        <div class="empty_box text-center">
                             <img class="mb-3" width="150px" src="/public/assets/backend/images/empty_box.png" />
                            <br>
                            <span class="">No Data Found</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>



<script>

function classWiseSection(classId) {
    var classId = $('#class_id').val(); 
 if (!classId) {
        $('#section_id').empty(); // Clear existing options
        $('#section_id').append($('<option>', { value: '', text: 'No Section Found' })); // Add default option
        return; // Exit the function
    }
    $.ajax({
        url: "{{ route('teacher.section.list', ['class_id' => ':class_id']) }}".replace(':class_id', classId),
        success: function(response){
            $('#section_id').empty(); // Clear existing options
            $.each(response, function (index, section) {
                $('#section_id').append($('<option>', { value: section.id, text: section.name }));
            });
        }
    });
}


</script>

<script>
function fetchStudents() {
    var classId = $('#class_id').val();
    var sectionId = $('#section_id').val();
    $.ajax({
        url: "{{ route('teacher.filterStudents') }}",
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


@extends('backend.teacher.header')
@extends('backend.teacher.navigation')
@extends('backend.teacher.footer')

@endsection