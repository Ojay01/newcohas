@extends('layouts.admin')
@section('title', 'Submitted Marks')
@section('content')

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-format-list-numbered title_icon"></i> Submitted Marks
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
                        <option value="">Select Exam</option>

                            <option value="#">Exam Name</option>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="class" id="class_id" class="form-control select2" data-toggle = "select2" required >
                        <option value="">Select Class</option>
                        
                            <option value="#">
                               class Nme
                                11
                            </option>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="section" id="section_id" class="form-control select2" data-toggle = "select2" required>
                        <option value="">Section ID</option>
                    </select>
                </div>
                
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="filter_attendance()" >Filter</button>
                </div>
            </div>
            <div class="card-body mark_content">
                <div class="empty_box text-center">
                    <img class="mb-3" width="150px" src="/public/assets/backend/images/empty_box.png" />
                    <br>
                    <span class="">No Data Found</span>
                </div>
            </div>
        </div>
    </div>
</div>

@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')
@endsection