@extends('backend.admin.website_settings.index')
@section('title', 'Terms And Condition Setings')

@section('settings')

<div class="card">
  <div class="card-body">
    <h4 class="header-title">Terms And Condistions Settings</h4>
    <form method="POST" class="col-12 termsAndConditionSettings" action="{{route('updateTermsAndConditionSettings')}} " id = "terms_and_conditions_settings">
    @csrf
      <div class="row justify-content-left">
        <div class="col-12">
          <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="about_us"> Terms and Condition</label>
            <div class="col-md-9">
              <textarea name="terms_and_conditions" id="terms_and_conditions" class="form-control" rows="8" cols="80" reqiured>{{$settings->terms_and_conditions}}</textarea>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" >Update Terms</button>
          </div>
        </div>
      </div>
    </form>

  </div> <!-- end card body-->
</div>
<script type="text/javascript">
$(document).ready(function () {
  initSummerNote(['#terms_and_conditions']);
});
</script>

@endsection