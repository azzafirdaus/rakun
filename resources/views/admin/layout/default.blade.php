<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Admin Control Panel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="MobileOptimized" content="320">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/uniform/css/uniform.default.css') }}">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/jqvmap/jqvmap/jqvmap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}">
    <link href="{{ asset('assets/plugins/select2/select2_conquer.css') }}" rel="stylesheet">
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style-conquer.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style-responsive.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/pages/tasks.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/themes/default.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css') }}">
    <link href="{{ asset('assets/css/pages/login.css') }}" rel="stylesheet">
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<body>
    <header> @include('admin.layout.header') </header>
    <div class="clearfix"></div>
    <div class="page-container">
        <hr class="hidden-print">
        <div class="sidebar"> @yield('sidebar') </div>
        <div class="contents"> @yield('content') </div>
    </div>
    <div class="clearfix"></div>
    <footer> @include('admin.layout.footer') </footer>
    
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>
    <script src="assets/plugins/excanvas.min.js"></script> 
    <![endif]-->
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-1.10.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-migrate-1.2.1.min.js') }}"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery.blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery.cokie.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/uniform/jquery.uniform.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script type="text/javascript" src="{{ URL::asset('assets/scripts/app.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/scripts/index.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/scripts/tasks.js') }}"></script>
    <script src="{{ asset('assets/scripts/login.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/scripts/jquery.table2excel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/scripts/jquery.base64.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/scripts/tableExport.js') }}" type="text/javascript"></script>
    
    
    
    
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
    jQuery(document).ready(function() {    
       App.init(); // initlayout and core plugins
       Login.init();
       Index.init();
       Index.initJQVMAP(); // init index page's custom scripts
       Index.initCalendar(); // init index page's custom scripts
       Index.initCharts(); // init index page's custom scripts
       Index.initChat();
       Index.initMiniCharts();
       Index.initPeityElements();
       Index.initKnowElements();
       Index.initDashboardDaterange();
       Tasks.initDashboardWidget();
    });
    </script>
</body>
</html>