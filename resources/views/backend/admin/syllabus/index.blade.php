@extends('layouts.admin')
@section('title', 'Syllabus Settings')
@section('content')

<!--title-->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body py-2">
                <h4 class="page-title d-inline-block">
                    <i class="mdi mdi-chart-timeline title_icon"></i> Syllabus
                </h4>
                <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="openCreateSyllabusModal()"> <i class="mdi mdi-plus"></i> Add Syllabus </button>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-1 mb-1"></div>
                    <div class="col-md-4 mb-1">
                        <select name="class" id="class_id" class="form-control select2" data-toggle = "select2" onchange="classWiseSection(this.value)" required>
                            <option value="">Select a Class</option>
                            <option value="#">
                                Class Name
                                11
                            </option>
                    </select>
                </div>
                <div class="col-md-4 mb-1">
                    <select name="section" id="section_id" class="form-control select2" data-toggle = "select2" required>
                        <option value="">Select Section</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="filter_syllabus()" >Filter</button>
                </div>
            </div>
            <div class="syllabus_content">
               @include('backend.admin.syllabus.list')
            </div>
        </div>
    </div>
</div>
</div>


<!-- Modal for Create Syllabus -->
<div class="modal fade mt-3" id="createSyllabusModal" tabindex="-1" aria-labelledby="createSyllabusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSyllabusModalLabel">Create Syllabus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('backend.admin.syllabus.create') 
            </div>
        </div>
    </div>
</div>

<script>
    function openCreateSyllabusModal() {
        $('#createSyllabusModal').modal('show');
    }
</script>
<script>

$('document').ready(function(){
    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id', '#section_id']);
});

function classWiseSection(classId) {
    $.ajax({
        url: #",
        success: function(response){
            $('#section_id').html(response);
        }
    });
}

function filter_syllabus(){
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    if(class_id != "" && section_id!= ""){
        showAllSyllabuses();
    }else{
        toastr.error('#');
    }
}

var showAllSyllabuses = function () {
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    if(class_id != "" && section_id!= ""){
        $.ajax({
            url: '#',
            success: function(response){
                $('.syllabus_content').html(response);
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