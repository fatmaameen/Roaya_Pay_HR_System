<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="rtl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="almayaar">
  <meta name="keywords" content="almayaar">
  <meta name="author" content="WaelSerag">
  <title>لوحة تحكم  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/vendors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/forms/icheck/icheck.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/forms/icheck/custom.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/app.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/login-register.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/forms/icheck/square/_all.css')}}">

  @if (session()->get('locale') == "ar")
  <style>
      body, .has-icon-left .form-control.input-lg {
          text-align: right;
          direction: rtl;
      }
      .text-md-left {
          text-align: right !important;
          direction: rtl;
          float: right;
      }
      .col-md-6 {
          max-width: 99%;
          width: 99%;
          flex: 0 0 100%;
      }
  </style>
  @endif
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 1-column menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" >
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row"></div>

      @if ($errors->count())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $e)
                      <li>{{ $e }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      @if (session()->has('success'))
          <div class="alert alert-success">{{ session()->get('success') }}</div>
      @endif

      @if (session()->has('error'))
          <div class="alert alert-danger">{{ session()->get('error') }}</div>
      @endif
      <br /><br />
      <div class="content-body">
          <div class="col-md-12 card-title text-center">
            <div class="p-1">
            </div>
          </div>
          <div class="clearfix"></div>
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span style="font-size:22px;">تسجيل الدخول</span>
                  </h6>
                </div>
                <style>
                    <style>
  input::placeholder {
    text-align: right;
  }
</style>

                </style>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal form-simple" method="post" action="{{ route('admin.login.store') }}" novalidate>
                        {{ csrf_field() }}

                        <fieldset class="form-group position-relative has-icon-left mb-0">
                          <input type="text" value="{{ old('email') }}" name="email" class="form-control form-control-lg input-lg" id="user-name" placeholder="البريد الالكتروني" required style="text-align: right;">
                          <div class="form-control-position">
                            <i class="ft-user"></i>
                          </div>
                        </fieldset>
                        <br>
                        <fieldset class="form-group position-relative has-icon-left">
                          <input type="password" value="{{ old('password') }}" name="password" class="form-control form-control-lg input-lg" id="user-password" placeholder="كلمة المرور" required style="text-align: right;">
                          <div class="form-control-position">
                            <i class="la la-key"></i>
                          </div>
                        </fieldset>

                        <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> ارسال</button>
                      </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('backend/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('backend/app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{ asset('backend/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ asset('backend/app-assets/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
