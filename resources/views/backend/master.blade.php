<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="description" content="Responsive Admin Template"/>
    <meta name="author" content="SmartUniversity"/>
    <title>BM Group BD</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css"/>
    <!-- icons -->
    <link href="{{url('')}}/assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"/>
    <link href="{{url('')}}/assets/css/invoice.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!--bootstrap -->
    <link href="{{url('')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/plugins/summernote/summernote.css" rel="stylesheet">
    <!-- morris chart -->
    <link href="{{url('')}}/assets/plugins/morris/morris.css" rel="stylesheet" type="text/css"/>
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="{{url('')}}/assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/material_style.css">

    <!-- data tables -->
    <link href="{{url('')}}/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>

    <!-- animation -->
    <link href="{{url('')}}/assets/css/pages/animate_page.css" rel="stylesheet">
    <!-- Template Styles -->
    <link href="{{url('')}}/assets/css/plugins.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/assets/css/theme-color.css" rel="stylesheet" type="text/css"/>
    <!-- dropzone -->
    <link href="{{url('')}}/assets/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
    <!-- Date Time item CSS -->
    <link rel="stylesheet"
          href="{{url('')}}/assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css"/>
    {{-- toastr --}}
    <link rel="stylesheet" href="{{url('/toaster/toastr.min.css')}}"/>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{url('/assets/img/favicon.ico')}}"/>

    <!--select2-->
    <link href="{{url('assets/plugins/select2/css/select2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- favicon -->

    <!-- date_picker -->
    <link href="{{url('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
@livewireStyles
</head>
<!-- END HEAD -->
<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
<div class="page-wrapper">

@include('backend.partials.header')

<!-- start page container -->
    <div class="page-container">

    @include('backend.partials.nav')
    <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">

                @yield('content', 'Welcome to BM Group BD')

            </div>
        </div>
        <!-- end page content -->

        <!-- Start Setting Panel -->

        <!-- end page container -->
        @include('backend.partials.footer')
    </div>
</div>
<!-- start js include path -->

<script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script src="{{url('')}}/assets/plugins/popper/popper.min.js"></script>
<script src="{{url('')}}/assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="{{url('')}}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{url('')}}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<!-- bootstrap -->
<script src="{{url('')}}/assets/js/pages/ui/animations.js"></script>
<script src="{{url('')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{url('')}}/assets/js/pages/sparkline/sparkline-data.js"></script>
<!-- Common js-->
<script src="{{url('')}}/assets/js/app.js"></script>
<script src="{{url('')}}/assets/js/layout.js"></script>
<script src="{{url('')}}/assets/js/theme-color.js"></script>
<!-- material -->
<script src="{{url('')}}/assets/plugins/material/material.min.js"></script>
<!-- animation -->
<!-- morris chart -->
<script src="{{url('')}}/assets/plugins/morris/morris.min.js"></script>
<script src="{{url('')}}/assets/plugins/morris/raphael-min.js"></script>
<script src="{{url('')}}/assets/js/pages/chart/morris/morris_home_data.js"></script>

<script src="{{url('')}}/assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
<script src="{{url('')}}/assets/plugins/material-datetimepicker/datetimepicker.js"></script>
<script src="{{url('')}}/assets/js/pages/material_select/getmdl-select.js"></script>

<!-- data tables -->
<script src="{{url('')}}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('')}}/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
<script src="{{url('')}}/assets/js/pages/table/table_data.js"></script>
<!-- dropzone -->
<script src="{{url('')}}/assets/plugins/dropzone/dropzone.js"></script>
<script src="{{url('')}}/assets/plugins/dropzone/dropzone-call.js"></script>
<!-- end js include path -->
<script src="{{url('/toaster/toastr.min.js')}}"></script>

<!--select2-->
<script src="{{url('assets/plugins/select2/js/select2.js')}}"></script>
<script src="{{url('assets/js/pages/select2/select2-init.js')}}"></script>
@livewireScripts
<script src="{{url('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}" ></script>
<script src="{{url('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js')}}" ></script>
{!! Toastr::message() !!}
@stack('js')
</body>
</html>
