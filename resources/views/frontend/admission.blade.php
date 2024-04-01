@extends('layouts.header')

@section('title', 'Online Admission')

@section('content')

<!-- ========== MAIN ========== -->
<main id="content" role="main">
  <!-- Hero Section -->
  <div class="gradient-half-primary-v1">
    <div class="container text-center space-top-4 space-top-md-4 space-top-lg-3 space-bottom-1">
      <!-- Title -->
      <div class="w-md-80 w-lg-50 mx-auto mb-5">
        <h1 class="h1 text-white">
          <span class="font-weight-semi-bold">{{('Online Admission')}}</span>
        </h1>
      </div>
      <!-- End Title -->
    </div>
  </div>
  <!-- End Hero Section -->

  <hr class="my-0">

  <!-- Admission Form Section -->
  <div class="container space-1 space-md-2">
    <!-- Title -->
    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-9">
      <span class="btn btn-xs btn-soft-success btn-pill mb-2">{{('Admission Form')}}</span>
      <h2 class="text-primary font-weight-normal">
        {{('Apply for Admission')}}
      </h2>
    </div>
    <!-- End Title -->

    <div class="w-lg-80 mx-auto">
      <!-- Contacts Form -->
      <form action="#" method="post" class="js-validate realtime-form" enctype="multipart/form-data">
      @csrf
        <div class="row">
          <!-- Input -->
          <div class="col-12"><h4 class="mx-0 pb-5">{{('Student Infomations')}}</h4></div>
          <div class="col-sm-6 mb-6">
            <div class="js-form-message">
              <label class="form-label">
                {{('Student Name')}}
                <span class="text-danger">*</span>
              </label>

              <input type="text" class="form-control" name="name"  required
                     data-msg="Please enter your first name."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->



          <!-- Input -->
          <div class="col-sm-6 mb-6">
            <div class="js-form-message">
              <label class="form-label">
                {{('Date of Birth')}}
              </label>

              <input type="date" class="form-control" name="date_of_birth" required
                     data-msg="Please enter your date of birth"
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->

          <!-- Input -->
          <div class="col-sm-6 mb-6">
            <div class="js-form-message">
              <label class="form-label">
               {{('Gender')}}
              </label>

              <select name="gender" id="gender" class="form-control"  required>
                    <option value="">{{('Select a Gender')}}</option>
                    <option value="Male">{{('Male')}}</option>
                    <option value="Female">{{('Female')}}</option>
                </select>
            </div>
          </div>
          <!-- End Input -->


          <!-- Input -->
          <div class="col-sm-6 mb-6">
            <div class="js-form-message">
              <label class="form-label">
                {{('Your Photo')}}
                <span class="text-danger">*</span>
              </label>

              <input id="student_image" type="file" class="image-upload" name="student_image" accept="image/*" required>
            </div>
          </div>
          <!-- End Input -->

          <!-- Input -->
          <div class="col-sm-6 mb-6">
            <div class="js-form-message">
              <label class="form-label">
                Educational Qualification
                <span class="text-muted">(PDF)</span>
              </label>

              <input id="pdf" type="file" class="image-upload" name="educational_qualifications" accept=".pdf" required>
            </div>
          </div>
          <!-- End Input -->

          <div class="w-100"></div>

          <!-- Input -->
          <div class="col-sm-12 mb-6">
            <div class="js-form-message">
              <label class="form-label">
                {{('Address')}}
                <span class="text-danger">*</span>
              </label>

              <textarea class="form-control" rows="3" name="address" required
                      data-msg="Please enter your address."
                      data-error-class="u-has-error"
                      data-success-class="u-has-success"></textarea>
            </div>
          </div>
          <!-- End Input -->

          <div class="col-12"><h4 class="mx-0 pb-5">{{('Parent Infomations')}}</h4></div>
          <div class="col-sm-6 mb-6">
            <div class="js-form-message">
              <label class="form-label">
                {{('Name of Parent')}}
                <span class="text-danger">*</span>
              </label>

              <input type="text" class="form-control" name="name_of_parent"  required
                     data-msg="Please enter your parent's name."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->


          <!-- Input -->
          <div class="col-sm-6 mb-6">
            <div class="js-form-message">
              <label class="form-label">
                {{('Phone Number of Parent')}}
                <span class="text-danger">*</span>
              </label>

              <input type="text" class="form-control" name="phone_number_of_parent" required
                     data-msg="Please enter a valid phone number."
                     data-error-class="u-has-error"
                     data-success-class="u-has-success">
            </div>
          </div>
          <!-- End Input -->

          <!-- Input -->
          <div class="col-sm-6 mb-6">
            <div class="js-form-message">
              <label class="form-label">
                {{('Gender')}}
              </label>

              <select name="parent_gender" id="parent_gender" class="form-control"  required>
                    <option value="">{{('Select a Gender')}}</option>
                    <option value="Male">{{('Male')}}</option>
                    <option value="Female">{{('Female')}}</option>
                </select>
            </div>
          </div>
          <!-- End Input -->
        </div>


        <div class="text-center">
          <button type="submit" id="submitBtn" class="btn btn-primary btn-wide transition-3d-hover mb-4">{{('Submit')}}</button>
          <button type="reset" id="resetBtn" style="display: none;"></button>
        </div>

      </form>
      <!-- End Contacts Form -->
    </div>
  </div>
  <!-- End Contact Form Section -->



<script type="text/javascript">
  $(function() {
      $('.realtime-form').ajaxForm({
          beforeSend: function() {
          },
          uploadProgress: function(event, position, total, percentComplete) {
              
          },
          complete: function(xhr) {
              setTimeout(function(){
                  var jsonResponse = JSON.parse(xhr.responseText);
                  if(jsonResponse.status == 1){
                    success_notify(jsonResponse.message);
                    $('#resetBtn').click();
                  }else{
                    error_notify(jsonResponse.message);
                  }
              }, 500);
          },
          error: function()
          {
              //You can write here your js error message
          }
      });
  });
</script>

@extends('frontend.footer')
@endsection