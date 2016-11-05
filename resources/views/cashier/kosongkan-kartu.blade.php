<!DOCTYPE html>
<?php
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
?>
<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Reset Saldo</title>
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
            <form class="login-form" action="{{ url('kosongkanKartu') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3 class="form-title hidden-print" style='font-size: 38px;'>Kosongkan Saldo</h3>
                <ul class="hidden-print">
			         @foreach ($errors->all() as $error)
				    <li style='font-size: 16px; color: red'>{{ $error }}</li>
			         @endforeach
                </ul>
                <?='<span style="font-size: 16px; color: red">'.Session::get('loginError').'</span>'?>

                <div class="form-group hidden-print">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-barcode fa-fw" style="font-size: 2em"></i>
                        </span>
                        <input id="barcode" class="form-control placeholder-no-fix" type="text" style='font-size: 24px;' autocomplete="off" placeholder="No. Kartu" name="noGelang"/>
                    </div>
                </div>

                <div class="form-actions hidden-print">
                    <button type="submit" class="btn btn-info"> 
                        <span class="glyphicon glyphicon-credit-card"></span> Submit
                    </button>
                </div>
                <br>
                <div class="col-md-6">
                    <div id="tagihan">
                        <br>
                        <div>
                            <table class="table table-hover" style="width:250px">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                         <span>
                                             Summary
                                         </span>
                                        <span class="visible-print">
                                             Periode : {{ date('Y-m-d') }}
                                        </span>
                                        <span class="visible-print">
                                             Jam : {{ date('H:i:s') }}
                                        </span>
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            
                                <tr class="hidden-print">
                                    <td >
                                         Sisa Saldo Kartu
                                    </td>
                                    <td>
                                        : Rp. {{ number_format($saldo) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Jumlah Total Saldo
                                    </td>  
                                    <td>
                                        : Rp. {{ number_format($jumlah) }}
                                    </td>  
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-actions hidden-print">
                    <button type="button" onclick="location.href = '{{ url('cashierMenu') }}';" class="btn btn-primary">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back To Cashier
                    </button>
                    <button type="button" class="btn btn-success" onclick="window.print();" style="float: right;">
                        <span class="glyphicon glyphicon-check"></span> Print Summary
                    </button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->
    </body>
<!-- END BODY -->

<script>
    window.onload = function() {
      var input = document.getElementById("barcode").focus();
    }
</script>

</html>