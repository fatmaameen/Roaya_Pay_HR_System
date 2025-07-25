<!DOCTYPE html>
<html class="loading" lang="en" @if (session()->get('locale') == "ar") data-textdirection="rtl" @else data-textdirection="ltr" @endif >

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Cpanel
  </title>
  <link rel="apple-touch-icon" href="{{ asset('backend/app-assets/images/ico/apple-icon-120.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/app-assets/images/ico/favicon.ico') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
    rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css-rtl/vendors.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/extensions/sweetalert.css')}}">

  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css-rtl/app.css') }}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css-rtl/core/colors/palette-gradient.css') }}">

  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/charts/morris.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/fonts/simple-line-icons/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css-rtl/core/colors/palette-gradient.css') }}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style-rtl.css')}}">

  <style>
    .mr-1,
    .mx-1 {
      margin-left: 0 !important;
      margin-right: 0 !important;
    }

    .btn-min-width {
      min-width: auto;
    }
  </style>
  <!-- END Custom CSS-->
  @yield('styles')
	@stack('styles')

</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern"
  data-col="2-columns">
  @include('admin.includes.header')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  @include('admin.includes.sidebar')


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="app-content content">
  @include('admin.includes.messages')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
      @yield('content')
      <!-- /.content -->

      <!-- /.content-wrapper -->
    </div>
  </div>
  @include('admin.includes.footer')


  <script src="{{ asset('backend/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/datatables-rtl.min.js')}}" type="text/javascript"></script>

  <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/vendors/js/tables/jszip.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/vendors/js/tables/pdfmake.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/vendors/js/tables/vfs_fonts.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/vendors/js/tables/buttons-rtl.html5.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/vendors/js/tables/buttons-rtl.colVis.min.js')}}" type="text/javascript"></script>

  <script src="{{ asset('backend/app-assets/vendors/js/tables/buttons.print.min.js')}}" type="text/javascript"></script>

  <!-- END PAGE VENDOR JS-->
  <script src="{{ asset('backend/app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/data/jvector/visitor-data.js')}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{ asset('backend/app-assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <script src="{{ asset('backend/app-assets/js/scripts/extensions/sweet-alerts.js')}}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <script src="{{asset('backend/app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('backend/app-assets/js/scripts/ui/jquery-ui/navigations.js')}}" type="text/javascript"></script>
  <!-- BEGIN PAGE LEVEL JS-->
  {{--
  <script src="{{ asset('backend/app-assets/js/scripts/pages/dashboard-sales.js')}}" type="text/javascript"></script> --}}
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ asset('backend/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js')}}"
    type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  @yield('scripts')
	@stack('scripts')

</body>

</html>
