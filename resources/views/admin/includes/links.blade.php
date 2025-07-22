<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
@if (session()->get('locale') == "ar")
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css-rtl/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/extensions/sweetalert.css')}}">

    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css-rtl/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css"
href="{{ asset('backend/app-assets/css-rtl/core/colors/palette-gradient.css') }}"> @else
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/vendors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/extensions/sweetalert.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/ui/jquery-ui.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css-rtl/plugins/ui/jqueryui.css')}}">
        <!-- END VENDOR CSS-->
        <!-- BEGIN MODERN CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/app.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('backend/app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/core/colors/palette-gradient.css') }}">
        <!-- END MODERN CSS-->
    @endif
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css"
    href="{{ asset('backend/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('backend/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('backend/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('backend/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/charts/morris.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/fonts/simple-line-icons/style.css') }}">
@if (session()->get('locale') == "ar")
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/app-assets/css-rtl/core/colors/palette-gradient.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style-rtl.css')}}"> @else
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/core/colors/palette-gradient.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css')}}"> @endif

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
