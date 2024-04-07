@extends('backend.admin.website_settings.index')
@section('title', 'Computer Laboratory')

@section('settings')

<div class="card">
  <div class="card-body">
    <h4 class="header-title">Computer Lab Images</h4>
    <form method="POST" class="col-12 homepageSliderSettings" action="{{ route('computerLab') }}" id = "homepage_slider_settings" enctype="multipart/form-data">
    @csrf
      <div class="row justify-content-left">
        <div class="col-12">
           @for ($i = 0; $i < 4; $i++)
          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="title_{{ $i }}"> Title {{ $i + 1 }}</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="title_{{ $i }}" name="title_{{ $i }}" value="{{ $sliderImages[$i]['title'] ?? '' }}" required>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="description_{{ $i }}"> Description {{ $i + 1 }}</label>
            <div class="col-md-9">
              <textarea name="description_{{ $i }}" id="description_{{ $i }}" class="form-control" rows="8" cols="80">{{ $sliderImages[$i]['description'] ?? '' }}</textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="physics_lab_{{ $i }}">Slider Image {{ $i + 1 }}</label>
            <div class="col-md-9 custom-file-upload">
              <div class="wrapper-image-preview" style="margin-left: -6px;">
                <div class="box" style="width: 250px;">
                <div class="js--image-preview" style="background-image: url('{{ asset('storage/app/public/slider_images/'.$sliderImages[$i]['image']) ?? ''}}'); background-color: #F5F5F5;"></div>

                  <div class="upload-options">
                    <label for="physics_lab_{{ $i }}" class="btn"> <i class="mdi mdi-camera"></i> Upload Image {{ $i + 1 }} <small>(1900 X 1260)</small></label>
                    <input id="physics_lab_{{ $i }}" style="visibility:hidden;" type="file" class="image-upload" name="physics_lab_{{ $i }}" accept="image/*">
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endfor
          <div class="text-center">
            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12">Update Settings</button>
          </div>
        </div>
      </div>
    </form>

  </div> <!-- end card body-->
</div>

<script type="text/javascript">
  $(document).ready(function() {
    @for ($i = 0; $i < count($sliderImages); $i++)
    initSummerNote(['#description_{{ $i }}']);
    @endfor
  });
</script>

@endsection