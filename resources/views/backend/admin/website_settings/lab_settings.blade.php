@extends('backend.admin.website_settings.index')
@section('title', 'Laboratory Settings')

@section('settings')

<div class="card">
  <div class="card-body">
    <h4 class="header-title">Laboratories Image slider</h4>
    <form method="POST" class="col-12 homepageSliderSettings" action="#" id = "homepage_slider_settings" enctype="multipart/form-data">
    @csrf
      <div class="row justify-content-left">
        <div class="col-12">
            <div class="form-group row mb-3">
              <label class="col-md-3 col-form-label" for="title_"> Title 1</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="title_" name = "#" value="#" required>
              </div>
            </div>
            <div class="form-group row mb-3">
              <label class="col-md-3 col-form-label" for="description_"> Description 1</label>
              <div class="col-md-9">
                <textarea name="description_" id="description_" class="form-control" rows="8" cols="80">Image Description</textarea>
              </div>
            </div>
            <div class="form-group row mb-3">
              <label class="col-md-3 col-form-label" for="example-fileinput">Slider Image  1</label>
              <div class="col-md-9 custom-file-upload">
                <div class="wrapper-image-preview" style="margin-left: -6px;">
                  <div class="box" style="width: 250px;">
                    <div class="js--image-preview" style="background-image: url(); background-color: #F5F5F5;"></div>
                    <div class="upload-options">
                      <label for="slider_image_" class="btn"> <i class="mdi mdi-camera"></i> Upload Image 1 <small>(1900 X 1260)</small></label>
                      <input id="slider_image_" style="visibility:hidden;" type="file" class="image-upload" name="#" accept="image/*">
                    </div>
                  </div>
                </div>
              </div>
            </div>
         
          <div class="text-center">
            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateHomepageSliderSettings()">Update Settings</button>
          </div>
        </div>
      </div>
    </form>

  </div> <!-- end card body-->
</div>


@endsection