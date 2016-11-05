<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Terapis Menu
        </title>
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
        <link rel="shortcut icon" href="favicon.ico"/>>

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
            <form class="login-form" action="{{ url('backToBar') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3 class="form-title hidden-print" style='font-size: 38px;'>Terapis Menu</h3>

                <br>
                <div class="col-md-6 col-md-offset-3" id="tagihan">
                        <div>
                            <span>No. Kartu : {{ $noKartu }}</span><br>
                            <span>Tanggal   : {{ $date }}</span>
                        </div>
                    <br>
                    <div>
                    <table class="table table-hover" style="width:250px">

                        <tbody>
                            
                    <tr>
                        <td>
                             Durasi
                        </td>
                        <td>
                             : {{ $durasi }} menit
                        </td>
                    </tr>   
                    <tr>    
                        <td>
                             Massage 
                        </td>
                        <td>
                            : Rp. {{ number_format($harga) }}
                        </td>
                    </tr>
                    <tr>    
                        <td>
                             Refund
                        </td>
                        <td>
                            : Rp. {{ number_format($refund) }}
                        </td>
                    </tr>    
                    <tr>    
                        <td>
                            Saldo Awal 
                        </td>
                        <td>
                            : Rp. {{ number_format($saldoAwal) }}
                        </td>
                    </tr>    
                    <tr>    
                        <td>
                            Sisa Saldo 
                        </td>
                        <td>
                            : Rp. {{ number_format($sisaSaldo) }}
                        </td>
                    </tr>    

                    </tbody>
                    </table>

                    <br>

                </div>
                
                </div>

                <div class="form-actions hidden-print">
                    <button type="button" class="btn btn-primary" onclick="location.href = '{{ url('terapisMenu') }}';">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back To Terapis
                    </button>
                    <div class="pull-right">
                        <input type="hidden" name="noKartu" value="{{ $noKartu }}">
                        <input type="hidden" name="total" value="{{ $total }}">
                        <button type="submit" formaction="{{ url('terapisPrint') }}" class="btn btn-success" onclick="window.print();">
                            <span class="glyphicon glyphicon-check"></span> Print Invoice
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