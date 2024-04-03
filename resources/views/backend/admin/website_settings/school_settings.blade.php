@extends('layouts.admin')
@section('title', 'Profile Settings')
@section('content')
<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title">
          <i class="mdi mdi-settings title_icon"></i>School Settings
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row">
  <div class="#">
    <div class="settings_content">
      
<div class="row justify-content-md-center">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">School Settings</h4>
                    <form method="POST" class="col-12 schoolForm" action="#" id = "schoolForm">
                    @csrf
                        <div class="col-12">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="school_name"> School Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="school_name" name="school_name" class="form-control"  value="#" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="phone">Phone</label>
                                <div class="col-md-9">
                                    <input type="text" id="phone" name="phone" class="form-control"  value="#" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="address"> Address</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="address" name = "address" rows="5" required>Address</textarea>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateSchoolInfo()">Update Settings</button>
                            </div>
                        </div>
                    </form>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
    </div>
  </div>
</div>

@extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')

@endsection