@section('footer')

<!-- ========== FOOTER ========== -->
<footer class="border-top" style="background-color: #3A1F04;">
  <div class="container space-2">
    <div class="row">
      <div class="col-sm-3 col-lg-2 order-sm-2 mb-4 mb-sm-0 ml-lg-auto">
        <h4 class="h6 font-weight-semi-bold" style="color: #fff;">Contact</h4>

        <!-- Address -->
        <address >
          <ul class="list-group list-group-flush list-group-borderless mb-0">
            <li class="" style="color: #77838f;" >
              number
            </li>
            <li class="" style="color: #77838f;">
              <a href="mailto:email">
               Email
              </a>
            </li>
            <li class="" style="color: #77838f;">
              Address
            </li>
          </ul>
        </address>
        <!-- End Address -->
      </div>
      <div class="col-sm-3 col-lg-2 order-sm-2 mb-4 mb-sm-0 ml-lg-auto">
        <h4 class="h6 font-weight-semi-bold" style="color: #fff;">About</h4>

        <!-- List Group -->
        <ul class="list-group list-group-flush list-group-borderless mb-0" style="background-color: #3A1F04;">
          <li><a class=" list-group-item-action"
            href=" {{route('about')}} ">About</a></li>
            <li><a class=" list-group-item-action"
              href="{{route('teachers')}} ">Teachers </a></li>
              <li><a class="list-group-item-action"
                href="{{route('gallery')}} ">Gallery </a></li>
              </ul>
              <!-- End List Group -->
            </div>

            <div class="col-sm-3 col-lg-2 order-sm-3 mb-4 mb-sm-0">
              <h4 class="h6 font-weight-semi-bold" style="color: #fff;">Resources</h4>

              <!-- List Group -->
              <ul class="list-group list-group-flush list-group-borderless mb-0">
                <li><a class=" list-group-item-action"
                  href="{{route('terms')}} ">Terms & Conditions</a></li>
                  <li><a class=" list-group-item-action"
                    href=" {{route('privacy')}} ">Privacy Policy</a></li>
                    <li><a class=" list-group-item-action"
                      href="{{route('login')}}">Login</a></li>
                    </ul>
                    <!-- End List Group -->
                  </div>


                  <div class="col-sm-6 col-lg-4 order-sm-1">
                    <div class="mb-1">
                      <select class="form-control" style="background-color: #77838f;" name="" >
                        <option value="cohas" selected>College of Hopes, Arts and Science</option>
                    </select>
                  </div>
                  <!-- Logo -->
                  <a class="d-inline-flex align-items-center mb-2" href="/">
                    <img src="#" style="height:45px;" />
                  </a>
                  <!-- End Logo -->

                  <div class="mb-4">
                    <p class="small text-muted">© Copyright</p>
                  </div>

                  <!-- Social Networks -->
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item mx-0">
                      <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
                      href="#" target="_blank">
                      <span class="fab fa-facebook-f btn-icon__inner"></span>
                    </a>
                  </li>
                  <li class="list-inline-item mx-0">
                    <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
                    href="#" target="_blank">
                    <span class="fab fa-instagram btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
                  href="#" target="_blank">
                  <span class="fab fa-twitter btn-icon__inner"></span>
                </a>
              </li>
              <li class="list-inline-item mx-0">
                <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
                href="#" target="_blank">
                <span class="fab fa-google btn-icon__inner"></span>
              </a>
            </li>
            <li class="list-inline-item mx-0">
              <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
              href="#" target="_blank">
              <span class="fab fa-youtube btn-icon__inner"></span>
            </a>
          </li>
          <li class="list-inline-item mx-0">
            <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
            href="#" target="_blank">
            <span class="fab fa-linkedin btn-icon__inner"></span>
          </a>
        </li>
      </ul>
      <!-- End Social Networks -->
    </div>
  </div>
</div>
</footer>
<!-- ========== END FOOTER ========== -->

<!-- Go to Top -->
<a class="js-go-to u-go-to" href="#"
data-position='{"bottom": 15, "right": 15 }'
data-type="fixed"
data-offset-top="400"
data-compensation="#header"
data-show-effect="slideInUp"
data-hide-effect="slideOutDown">
<span class="fas fa-arrow-up u-go-to__inner"></span>
</a>
<!-- End Go to Top -->









  <!-- JS Global Compulsory -->
  <script src="/public/assets/frontend/ultimate/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="/public/assets/frontend/ultimate/vendor/popper.js/dist/umd/popper.min.js"></script>
  <script src="/public/assets/frontend/ultimate/vendor/bootstrap/bootstrap.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="/public/assets/frontend/ultimate/vendor/hs-megamenu/src/hs.megamenu.js"></script>
  <script src="/public/assets/frontend/ultimate/vendor/svg-injector/dist/svg-injector.min.js"></script>
  <script src="/public/assets/frontend/ultimate/vendor/fancybox/jquery.fancybox.min.js"></script>
  <script src="/public/assets/frontend/ultimate/vendor/slick-carousel/slick/slick.js"></script>
  <script src="/public/assets/frontend/ultimate/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="/public/assets/frontend/ultimate/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>


  <!-- JS Front -->
  <script src="/public/assets/frontend/ultimate/js/hs.core.js"></script>
  <script src="/public/assets/frontend/ultimate/js/components/hs.header.js"></script>
  <script src="/public/assets/frontend/ultimate/js/components/hs.unfold.js"></script>
  <script src="/public/assets/frontend/ultimate/js/components/hs.fancybox.js"></script>
  <script src="/public/assets/frontend/ultimate/js/components/hs.slick-carousel.js"></script>
  <script src="/public/assets/frontend/ultimate/js/components/hs.validation.js"></script>
  <script src="/public/assets/frontend/ultimate/js/components/hs.focus-state.js"></script>

  <script src="/public/assets/frontend/ultimate/js/components/hs.g-map.js"></script>
  <script src="/public/assets/frontend/ultimate/js/components/hs.cubeportfolio.js"></script>
  <script src="/public/assets/frontend/ultimate/js/components/hs.svg-injector.js"></script>
  <script src="/public/assets/frontend/ultimate/js/components/hs.go-to.js"></script>
  <script src="/public/assets/frontend/ultimate/js/custom.js"></script>
  <script src="/public/assets/jquery-form/jquery.form.min.js"></script>
  <script src="/public/assets/toastr/toastr.min.js"></script>


<script type="text/javascript">
  'use strict';
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "slideUp"
  }
  function success_notify(message) {
    toastr.success(message);
  }

  function error_notify(message) {
    toastr.error(message);
  }
</script>

  <!-- JS Plugins Init. -->
  <script>
    $(window).on('load', function () {
      // initialization of HSMegaMenu component
      $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 767.98,
        hideTimeOut: 0
      });

      // initialization of svg injector module
      $.HSCore.components.HSSVGIngector.init('.js-svg-injector');
    });

    $(document).on('ready', function () {
      // initialization of header
      $.HSCore.components.HSHeader.init($('#header'));

      // initialization of unfold component
      $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

      // initialization of fancybox
      $.HSCore.components.HSFancyBox.init('.js-fancybox');

      // initialization of slick carousel
      $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

      // initialization of form validation
      $.HSCore.components.HSValidation.init('.js-validate');

      // initialization of forms
      $.HSCore.components.HSFocusState.init();

      // initialization of cubeportfolio
      $.HSCore.components.HSCubeportfolio.init('.cbp');

      // initialization of go to
      $.HSCore.components.HSGoTo.init('.js-go-to');
    });
  </script>

@endsection