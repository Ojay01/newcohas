@extends('backend.admin.website_settings.index')
@section('title', 'General Setings')

@section('settings')

<div class="card">
  <div class="card-body">
    <h4 class="header-title">General Settings</h4>
    <form method="POST" class="col-12 generalSettingsAjaxForm" action="{{route('update-general-settings')}} " id = "general_settings" enctype="multipart/form-data">
    @csrf
      <div class="row justify-content-left">
        <div class="col-12">
          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="website_title"> Website Title </label>
            <div class="col-md-9">
              <input type="text" id="website_title" name="website_title" class="form-control"  value="{{ $settings->website_title}}" required>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="social_links"> Social Links</label>
            <div class="col-md-9">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                </div>
                <input type="text" class="form-control" name="facebook_link" value="{{ $settings->social_links['facebook']}}">
              </div>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for=""></label>
            <div class="col-md-9">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                </div>
                <input type="text" class="form-control" name="twitter_link" value="{{ $settings->social_links['twitter']}}">
              </div>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for=""></label>
            <div class="col-md-9">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
                </div>
                <input type="text" class="form-control" name="linkedin_link" value="{{ $settings->social_links['linkedin']}}">
              </div>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for=""></label>
            <div class="col-md-9">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="mdi mdi-google"></i></span>
                </div>
                <input type="text" class="form-control" name="google_link" value="{{ $settings->social_links['google']}}">
              </div>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for=""></label>
            <div class="col-md-9">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="mdi mdi-youtube"></i></span>
                </div>
                <input type="text" class="form-control" name="youtube_link" value="{{ $settings->social_links['youtube']}}">
              </div>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for=""></label>
            <div class="col-md-9">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
                </div>
                <input type="text" class="form-control" name="instagram_link" value="{{ $settings->social_links['instagram']}}">
              </div>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="homepage_note_title"> Homepage Title</label>
            <div class="col-md-9">
              <input type="text" id="homepage_note_title" name="homepage_note_title" class="form-control"  value="{{ $settings->homepage_note_title}}" required>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="homepage_note_description"> Homepage Description</label>
            <div class="col-md-9">
              <textarea name="homepage_note_description" id="homepage_note_description" class="form-control" rows="8" cols="80">{{ $settings->homepage_note_description}}</textarea>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="homepage_note_description">  Message from Principal</label>
            <div class="col-md-9">
              <textarea name="principal" id="principal" class="form-control" rows="8" cols="80">{{ $settings->principal}}</textarea>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="copyright_text"> Copyright Text</label>
            <div class="col-md-9">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="mdi mdi-copyright"></i></span>
                </div>
                <input type="text" class="form-control" name="copyright_text" value="{{ $settings->copyright_text}}">
              </div>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-fileinput">Image of Principal</label>
            <div class="col-md-9 custom-file-upload">
              <div class="wrapper-image-preview" style="margin-left: -6px;">
                <div class="box" style="width: 250px;">
                  <div class="js--image-preview" style="background-image: url('{{ asset('storage/app/public/logos/' . $settings->principal_image) }}'); background-color: #F5F5F5;"></div>
                  <div class="upload-options">
                    <label for="principal_image" class="btn"> <i class="mdi mdi-camera"></i> Upload Header Logo <small>(80 X 80)</small></label>
                    <input id="principal_image" style="visibility:hidden;" type="file" class="image-upload" name="principal_image" accept="image/*">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-fileinput">Header Logo</label>
            <div class="col-md-9 custom-file-upload">
              <div class="wrapper-image-preview" style="margin-left: -6px;">
                <div class="box" style="width: 250px;">
                  <div class="js--image-preview" style="background-image: url('{{ asset('storage/app/public/logos/' . $settings->header_logo) }}'); background-color: #F5F5F5;"></div>
                  <div class="upload-options">
                    <label for="header_logo" class="btn"> <i class="mdi mdi-camera"></i> Upload Header Logo <small>(80 X 80)</small></label>
                    <input id="header_logo" style="visibility:hidden;" type="file" class="image-upload" name="header_logo" accept="image/*">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-fileinput">Footer Logo</label>
            <div class="col-md-9 custom-file-upload">
              <div class="wrapper-image-preview" style="margin-left: -6px;">
                <div class="box" style="width: 250px;">
                  <div class="js--image-preview" style="background-image: url('{{ asset('storage/app/public/logos/' . $settings->footer_logo) }}'); background-color: #F5F5F5;"></div>
                  <div class="upload-options">
                    <label for="footer_logo" class="btn"> <i class="mdi mdi-camera"></i> Upload Footer Logo <small>(80 X 80)</small></label>
                    <input id="footer_logo" style="visibility:hidden;" type="file" class="image-upload" name="footer_logo" accept="image/*">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateGeneralSettings()">Update Settings</button>
          </div>
        </div>
      </div>
    </form>

  </div> <!-- end card body-->
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#homepage_note_description').summernote();
    $('#principal').summernote();
});
</script>

@endsection