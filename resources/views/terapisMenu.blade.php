<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Terapis Menu</title>
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
        <!--<img src="assets/img/logo.png" alt=""/>-->
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="{{ url('terapisMenu') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3 class="form-title" style='font-size: 38px;'>Terapis Menu</h3>

                <div class="form-actions" >
                    <button type="button" onclick="location.href = '{{ url('cariTerapis') }}';" class="btn btn-default pull-left" id="cari">
                        <span class="glyphicon glyphicon-search"></span> Cek Saldo
                    </button>
                    <div class="pull-right">
                        <button type="button" onclick="location.href = '{{ url('changeTerapis') }}';" class="btn btn-default">
                            <span class="glyphicon glyphicon-transfer"></span> Change Terapis
                        </button>
                        <button type="button" onclick="location.href = '{{ url('terapisBayar') }}';" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Bayar
                        </button>
                    </div>
                </div>

                    @foreach ($errors->all() as $error)
                        <li style='font-size: 16px; color: red'>{{ $error }}</li>
                    @endforeach

                <br>    
                
                    <p style='font-size: 16px; color: green'>{{ $success }}</p>
                <ul><?='<span style="font-size: 16px; color: red">'.Session::get('successMsg').'</span>'?></ul>
                
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-barcode fa-fw" style="font-size: 2em"></i>
                        </span>
                        <input class="form-control placeholder-no-fix" type="text" style='font-size: 24px;' autocomplete="off" placeholder="No. Kartu" name="noGelang"/>
                    </div>
                </div>
                <br>
                <div class="form-actions">
                    <div class="alert alert-success" style="font-size:20px;">
                        <strong>No Kartu : {{ $nama }}</strong>
                        <br>
                        <strong>Saldo    : {{ $saldo }}</strong>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success" formaction="cekSaldo">
                            <span class="glyphicon glyphicon-th-list"></span> Saldo
                        </button>
                    </div>
                </div>
            </form>
            <form class="login-form" action="{{ url('terapisMenu') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="noGelang" value="{{ $nama }}">

                <br>    
                
                    <p style='font-size: 16px; color: green'>{{ $success }}</p>
                <ul><?='<span style="font-size: 16px; color: red">'.Session::get('successMsg').'</span>'?></ul>
                
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-barcode fa-fw" style="font-size: 2em"></i>
                        </span>
                        <input class="form-control placeholder-no-fix" type="text" style='font-size: 24px;' autocomplete="off" placeholder="No. Terapis" name="noKartu"/>
                    </div>
                </div>
                <br>
                <div class="form-actions">
                    <div class="pull-right">
                        <button type="button" onclick="location.href = '{{ url('stopTerapisMenu') }}';" class="btn btn-danger">
                            <span class="glyphicon glyphicon-stop"></span> Stop
                        </button>
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-play"></span> Start
                        </button>
                    </div>
                </div>
                
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->
    </body>
<!-- END BODY -->
</html>