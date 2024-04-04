@extends('backend.admin.website_settings.index')
@section('title', 'About Us Setings')

@section('settings')

<div class="card">
  <div class="card-body">
    <h4 class="header-title">About Us Settings</h4>
    <form method="POST" class="col-12 aboutUsSettings" action="{{route('updateAboutUs')}} " id = "about_us_settings" enctype="multipart/form-data">
    @csrf
      <div class="row justify-content-left">
        <div class="col-12">
          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="about_us"> About Us</label>
            <div class="col-md-9">
              <textarea name="about_us" id="about_us" class="form-control" rows="8" cols="80">{{$settings->about_us}}</textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-fileinput">About Us Banner</label>
            <div class="col-md-9 custom-file-upload">
              <div class="wrapper-image-preview" style="margin-left: -6px;">
                <div class="box" style="width: 250px;">
                  <div class="js--image-preview" style="background-image: url('{{ asset('storage/app/public/logos/' . $settings->about_us_image) }}'); background-color: #F5F5F5;"></div>
                  <div class="upload-options">
                    <label for="about_us_image" class="btn"> <i class="mdi mdi-camera"></i> Upload About Us Image </label>
                    <input id="about_us_image" style="visibility:hidden;" type="file" class="image-upload" name="about_us_image" accept="image/*">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12">Update Settings</button>
          </div>
        </div>
      </div>
    </form>

  </div> <!-- end card body-->
</div>

<script type="text/javascript">
$(document).ready(function () {
  initSummerNote(['#about_us']);
});
</script>
@endsection