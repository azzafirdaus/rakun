<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Menu Bar Lantai 4</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <meta name="MobileOptimized" content="320">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrapCustom.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet">
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ asset('assets/plugins/select2/select2_conquer.css') }}" rel="stylesheet">
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->
        <link href="{{ asset('assets/css/style-conquer.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/styleCustom.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/themes/default.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/pages/loginWide.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    
    <!-- BEGIN BODY -->
    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
<!--            <img src="assets/img/logo.png" alt=""/>-->
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="{{ url('bar3PreMenu') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3 class="form-title" style='font-size: 38px;'>Menu Bar Lantai 4</h3>

				<p style='font-size: 16px; color: green'>{{ $success }}</p>
                <div class="form-actions" >
                    <button type="button" onclick="location.href = '{{ url('cariBar3Pre') }}';" class="btn btn-default pull-left" id="cari">
                        <span class="glyphicon glyphicon-search"></span> Cek Saldo
                    </button>
                    <button type="button" class="btn btn-success pull-right" onclick="location.href = '{{ url('stock_bar3') }}';">
                        <span class="glyphicon glyphicon-stats"></span> Gudang
                    </button>
                </div>
                <br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style='font-size: 16px; color: red'>{{ $error }}</li>
                    @endforeach
                </ul>
                <br>
                
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-barcode fa-fw" style="font-size: 2em"></i>
                        </span>
                        <input class="form-control placeholder-no-fix" type="number" style='font-size: 24px;' autocomplete="off" placeholder="No. Kartu" name="noKartu"/>
                    </div>
                </div>
                <br>
                
                <div class="form-actions">
                    <button type="button" onclick="location.href = '{{ url('auth/bar3Logout') }}';" class="btn btn-primary">
                        <span class="glyphicon glyphicon-log-out"></span> Logout
                    </button>
                    <button type="submit" class="btn btn-success pull-right">
                            <span class="glyphicon glyphicon-check"></span> Submit
                    </button>
                <div>
            </form>
            <!-- END LOGIN FORM -->
            
            <br>

        </div>
        <!-- END LOGIN -->
    </body>
<!-- END BODY -->
</html>