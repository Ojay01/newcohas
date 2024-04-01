@extends('layouts.admin')

@section('title', 'Platform Settings')

@section('content')
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title">
          <i class="mdi mdi-settings title_icon"></i>Platform Settings        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="header-title d-inline-block">Platform Settings</h4>
        <form method="POST" class="col-12 systemAjaxForm" action="#" id = "system_settings">
        @csrf
          <div class="col-12">
            <div class="form-group row mb-3">
              <label class="col-md-3 col-form-label" for="system_name"> School Name</label>
              <div class="col-md-9">
                <input type="text" id="system_name" name="system_name" class="form-control"  value="#" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 col-form-label" for="system_title">Title</label>
              <div class="col-md-9">
                <input type="text" id="system_title" name="system_title" class="form-control"  value="#" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 col-form-label" for="system_email"> School Email</label>
              <div class="col-md-9">
                <input type="email" id="system_email" name="system_email" class="form-control"  value="#" required>
              </div>
            </div>
            <div class="form-group row mb-3">
              <label class="col-md-3 col-form-label" for="phone"> Phone Number</label>
              <div class="col-md-9">
                <input type="text" id="phone" name="phone" class="form-control"  value="#" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 col-form-label" for="fax"> Registration Number</label>
              <div class="col-md-9">
                <input type="text" id="fax" name="fax" class="form-control"  value="#" required>
              </div>
            </div>

            <div class="form-group row mb-3">
              <label class="col-md-3 col-form-label" for="address"> Address</label>
              <div class="col-md-9">
                <textarea class="form-control" id="address" name = "address" rows="5" required>#</textarea>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateSystemInfo($('#system_name').val())">Update Settings</button>
            </div>
          </div>
        </form>

      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div>

</div>
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">Platform Logo</h4>
        <form method="POST" class="col-12 systemLogoAjaxForm" action="#" id = "system_settings" enctype="multipart/form-data">
        @csrf

          <div class="row justify-content-center">
            <div class="col-xl-4">
              <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="example-fileinput">Regular Logo</label>
                <div class="col-md-9 custom-file-upload">
                  <div class="wrapper-image-preview" style="margin-left: -6px;">
                    <div class="box" style="width: 250px;">
                      <div class="js--image-preview" style="background-image: url(); background-color: #F5F5F5;"></div>
                      <div class="upload-options">
                        <label for="dark_logo" class="btn"> <i class="mdi mdi-camera"></i> Upload Logo <small>(600 X 150)</small></label>
                        <input id="dark_logo" style="visibility:hidden;" type="file" class="image-upload" name="dark_logo" accept="image/*">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4">
              <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="example-fileinput">Light Logo</label>
                <div class="col-md-9 custom-file-upload">
                  <div class="wrapper-image-preview" style="margin-left: -6px;">
                    <div class="box" style="width: 250px;">
                      <div class="js--image-preview" style="background-image: url(); background-color: #F5F5F5;"></div>
                      <div class="upload-options">
                        <label for="light_logo" class="btn"> <i class="mdi mdi-camera"></i> Upload Logo <small>(600 X 150)</small></label>
                        <input id="light_logo" style="visibility:hidden;" type="file" class="image-upload" name="light_logo" accept="image/*">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4">
              <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="example-fileinput">Small Logo</label>
                <div class="col-md-9 custom-file-upload">
                  <div class="wrapper-image-preview" style="margin-left: -6px;">
                    <div class="box" style="width: 250px;">
                      <div class="js--image-preview" style="background-image: url(); background-color: #F5F5F5;"></div>
                      <div class="upload-options">
                        <label for="small_logo" class="btn"> <i class="mdi mdi-camera"></i> Upload Small Logo <small>(80 X 80)</small></label>
                        <input id="small_logo" style="visibility:hidden;" type="file" class="image-upload" name="small_logo" accept="image/*">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4">
              <div class="form-group row mb-3">
                <label class="col-md-3 col-form-label" for="example-fileinput">favicon</label>
                <div class="col-md-9 custom-file-upload">
                  <div class="wrapper-image-preview" style="margin-left: -6px;">
                    <div class="box" style="width: 250px;">
                      <div class="js--image-preview" style="background-image: url(); background-color: #F5F5F5;"></div>
                      <div class="upload-options">
                        <label for="favicon" class="btn"> <i class="mdi mdi-camera"></i> Upload Favicon <small>(80 X 80)</small></label>
                        <input id="favicon" style="visibility:hidden;" type="file" class="image-upload" name="favicon" accept="image/*">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-6 col-md-12 col-sm-12" onclick="updateSystemLogo()">Upload Logo</button>
          </div>
        </form>
      </div> <!-- end card body-->
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#timezone']);
});
</script>


  @extends('backend.admin.header')
@extends('backend.admin.navigation')
@extends('backend.admin.footer')

@endsection