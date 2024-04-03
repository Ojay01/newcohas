@extends('layouts.admin')
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
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="openCreateRoutineModal()"> <i class="mdi mdi-plus"></i> Add Timetable</button>
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
					<select name="class" id="class_id" class="form-control select2" data-bs-toggle="select2" required onchange="classWiseSection(this.value)">
						<option value="">Select a Class</option>
							<option value="#">
								Class Name
								11
							</option>
					</select>
				</div>
				<div class="col-md-4 mb-1">
					<select name="section" id="section_id" class="form-control select2" data-bs-toggle="select2" required>
						<option value="">Select Section</option>
					</select>
				</div>
				<div class="col-md-2">
					<button class="btn btn-block btn-secondary" onclick="filter_class_routine()" >Filter</button>
				</div>
			</div>
			<div class="card-body class_routine_content">
				@include('backend.admin.routine.list')
			</div>
		</div>
	</div>
</div>

<script>

function classWiseSection(classId) {
	$.ajax({
		url: "#",
		success: function(response){
			$('#section_id').html(response);
		}
	});
}

function filter_class_routine(){
	var class_id = $('#class_id').val();
	var section_id = $('#section_id').val();
	if(class_id != "" && section_id!= ""){
		getFilteredClassRoutine();
	}else{
		toastr.error('#');
	}
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


<!-- Modal for Create Routine -->
<div class="modal fade mt-3" id="createRoutineModal" tabindex="-1" aria-labelledby="createRoutineModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createRoutineModalLabel">Create Routine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.routine.create') 
            </div>
        </div>
    </div>
</div>

<script>
    function openCreateRoutineModal() {
        $('#createRoutineModal').modal('show');
    }
</script>

 @extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection