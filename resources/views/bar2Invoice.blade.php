<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Invoice Bar Lantai 3</title>
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
            <form class="login-form" action="{{ url('backToBar2') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3 class="form-title hidden-print" style='font-size: 38px;'>Invoice Bar Lantai 3 </h3>

                <br>
                <div class="col-md-6 col-md-offset-3" id="tagihan">
                    <div>
                        <span>No. Kartu : {{ $noKartu }}</span>
                    </div>
                    <br>
                    <div>
                    <table class="table table-hover" style="width:250px">
                        <thead>
                    <tr>
                        <th>
                             Qty.
                        </th>
                        <th>
                             Nama
                        </th>
                        <th>
                             Jumlah
                        </th>

                    </tr>
                    </thead>
                        <tbody>
                            
                    @foreach($transaksiBar as $datanya)
                    <tr>
                        <td>
                             {{ $datanya['qty'] }}
                        </td>
                        <td>
                             {{ $datanya['isi'] }}
                        </td>
                        <td>
                             {{ $datanya['jumlah'] }}
                        </td>
                    </tr>    
                    @endforeach 
                            
                    <tr class="blank_row">
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td>
                            <strong class="customFontSize">Total</strong>
                        </td>
                        <td colspan="1">&nbsp;</td>
                        <td>
                            <strong class="customFontSize"> {{ $totalTransaksiBar }} </strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong class="customFontSize">Saldo Sebelum</strong>
                        </td>
                        <td colspan="1">&nbsp;</td>
                        <td>
                            <strong class="customFontSize"> {{ $saldo }} </strong>
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <strong class="customFontSize">Sisa Saldo</strong>
                        </td>
                        <td colspan="1">&nbsp;</td>
                        <td>
                            <strong class="customFontSize"> {{ $sisa }} </strong>
                        </td>
                    </tr>        
                    </tbody>
                    </table>

                    <br>

				</div>
                
                </div>
                                        @foreach($transaksiBar1 as $value1)
                                            <input type="hidden" name="result1[]" value="{{ $value1 }}">
                                        @endforeach
                                        @foreach($transaksiBar2 as $value2)
                                            <input type="hidden" name="result2[]" value="{{ $value2 }}">
                                        @endforeach
                <div class="form-actions hidden-print">
                    <input class="hidden" name="noKartu" value="{{ $noKartu }}">
                    <input class="hidden" name="harga" value="{{ $totalTransaksiBar }}">
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back
                    </button>
                    <div class="pull-right">
                        <button type="submit" formaction="{{ url('bar2Print') }}" class="btn btn-success" onclick="window.print();">
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