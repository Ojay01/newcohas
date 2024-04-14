@extends('layouts.teacher')
@section('title', 'Timetable')
@section('content')

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
			<i class="mdi mdi-calendar-today title_icon"></i> Class Routine
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
				<div class="col-md-4 mb-1">
					<select name="class" id="class_id" class="form-control " data-bs-toggle="select2" required onchange="classWiseSection(this.value)">
						<option value="">Select a Class</option>
							@foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
					</select>
				</div>
				<div class="col-md-4 mb-1">
					<select name="section" id="section_id" class="form-control " data-bs-toggle="select2" required>
						<option value="">Select Section</option>
                         @if ($class_id != "")
            @foreach ($sections as $section)
                
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
               
            @endforeach
        @endif
					</select>
				</div>
				<div class="col-md-2">
					<button class="btn btn-block btn-secondary" onclick="filter_class_routine()">Filter</button>
				</div>
			</div>
			<div class="card-body class_routine_content">
                         @if ($class_id != "")
				@include('backend.teacher.routine.list')
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
    var classId = $('#class_id').val(); // Get the selected class ID

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


function filter_class_routine(){
	var class_id = $('#class_id').val();
	var section_id = $('#section_id').val();
    $.ajax({
        url: "{{ route('teacher.classRoutine') }}",
        method: 'GET',
        data: {
            class_id: class_id,
            section_id: section_id,
        },
        success: function(response) {
            // Handle successful response here
              $('.class_routine_content').html(response);
        },
        error: function(xhr, status, error) {
            // Handle error here
            // console.error(xhr.responseText);
        }
    });
}

var getFilteredClassRoutine = function() {
	var class_id = $('#class_id').val();
	var section_id = $('#section_id').val();
	if(class_id != "" && section_id!= ""){
		$.ajax({
			url: '#',
			success: function(response){
				$('.class_routine_content').html(response);
			}
		});
	}
}
</script>




<script>
    function openCreateRoutineModal() {
        $('#createRoutineModal').modal('show');
    }
</script>

 @extends('backend.teacher.header')
@extends('backend.teacher.navigation')
@extends('backend.teacher.footer')
@endsection