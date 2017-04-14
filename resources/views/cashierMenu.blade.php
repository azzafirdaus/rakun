<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Cashier Menu</title>
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
        <link href="{{ asset('assets/css/styleCashierMenu.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/themes/default.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/pages/loginWide.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
        <!-- BEGIN EXTERNAL SCRIPTS -->
        <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- END EXTERNAL SCRIPTS -->
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
            <div class="page-container">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3 class="form-title" style='font-size: 38px;'>Cashier Menu</h3>

                <div class="form-actions" >
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#openMd1">
                        <span class="glyphicon glyphicon-folder-open"></span> Open Transaction
                    </button>
                    <button type="button" style="margin-right: 10px;" onclick="location.href = '{{ url('kosongkanKartu') }}';" class="btn btn-primary pull-right" >
                        <span class="glyphicon glyphicon-credit-card"></span> Kosongkan Kartu
                    </button>
                    <button type="button" onclick="location.href = '{{ url('cariCashier') }}';" class="btn btn-default pull-left" id="cari">
                        <span class="glyphicon glyphicon-search"></span> Cek Saldo
                    </button>
                </div>
                <br>
                <div class="well well-lg">
                    <ul>
                         @foreach ($errors->all() as $error)
                        <li style='font-size: 16px; color: red'>{{ $error }}</li>
                         @endforeach
                    
                    <p style='font-size: 16px; color: green'>{{ $success }}</p>
                        
                    <?='<span style="font-size: 16px; color: red">'.Session::get('condition').'</span>'?>
                    </ul>
                    
                    <a href="{{ url('/auth/register') }}" class="icon-btn">
                        <div>
                            <br>
                            <i class="fa fa-male fa-fw" style="font-size: 4em"></i>
                            <h4>Register</h4>
                        </div>
                    </a>

                    <a href="{{ url('karaokeMenu') }}" class="icon-btn">
                        <div>
                            <br>
                            <i class="fa fa-microphone fa-fw" style="font-size: 4em"></i>
                            <h4>Karaoke</h4>
                        </div>
                    </a>

                    <a href="{{ url('pembayaran') }}" class="icon-btn">
                        <div>
                            <br>
                            <i class="fa fa-money fa-fw" style="font-size: 4em"></i>
                            <h4>Top Up Saldo</h4>
                        </div>
                    </a>
                </div>
                
                
                <div class="form-actions">
                    <button type="button" onclick="location.href = '{{ url('auth/cashierLogout') }}';" class="btn btn-primary pull-left">
                        <span class="glyphicon glyphicon-log-out"></span> Logout
                    </button>
                    <div class="pull-right">                
                        <button type="button" class="btn btn-success" onclick="location.href = '{{ url('pendapatan-terapis') }}';">
                            <span class="glyphicon glyphicon-list"></span> Pendapatan Terapis
                        </button>
                        <button type="button" class="btn btn-success" onclick="location.href = '{{ url('stock') }}';">
                            <span class="glyphicon glyphicon-stats"></span> Stock
                        </button>
                    </div>
                </div>    
                
            </div>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN MODAL-->
        <div id="openMd2" class="modal fade" tabindex="-1" aria-hidden="true">
            
            <form class="login-form" action="{{ url('openTransaction') }}" method="get">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h3 class="modal-title">Masukkan kata sandi Anda</h3>
                    </div>
                    <div class="modal-body">
                        <div class="scroller" data-always-visible="1" data-rail-visible1="1">
                            <p>
                                <input type="password" class="form-control" name="passnya"/>
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                        <button type="submit" class="btn btn-success" id="openTrans">Lanjut</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        
        <div id="openMd1" class="modal fade" tabindex="-1" aria-hidden="true">
            
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h3 class="modal-title">Anda yakin ingin membuka transaksi?</h3>

                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                            <button type="submit" data-dismiss="modal" class="btn btn-success" id="openTrans" data-toggle="modal" data-target="#openMd2">Lanjut</button>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
        <!-- END MODAL-->
    </body>
<!-- END BODY -->
</html>