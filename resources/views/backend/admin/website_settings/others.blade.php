@extends('backend.admin.website_settings.index')
@section('title', 'Log Image Setings')

@section('settings')


<div class="card">
  <div class="card-body">
    <h4 class="header-title">Other Settings</h4>
    <form method="POST" class="col-12 otherSettingsAjaxForm" action="#" enctype="multipart/form-data">
    @csrf
      <div class="row justify-content-left">
        <div class="col-12">
          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-fileinput">Login Page Banner</label>
            <div class="col-md-9 custom-file-upload">
              <div class="wrapper-image-preview" style="margin-left: -6px;">
                <div class="box" style="width: 250px;">
                  <div class="js--image-preview" style="background-image: url(); background-color: #F5F5F5;"></div>
                  <div class="upload-options">
                    <label for="login_banner" class="btn"> <i class="mdi mdi-camera"></i> Upload Banner <small>(2000 X 1350)</small></label>
                    <input id="login_banner" style="visibility:hidden;" type="file" class="image-upload" name="login_banner" accept="image/*">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateOtherSettings()">Update Settings</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
