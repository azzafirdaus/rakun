<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Top Up Saldo</title>
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
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/pages/terapis.css') }}" rel="stylesheet">
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <style type="text/css">
        button {
            width: 200px;
            height: 100px;
        }
    </style>
    <!-- BEGIN BODY -->
    <body class="terapis">

        <div class="home-button">
            <form class="terapis-form" method="post" action="{{ url('printTopUp') }}" > 
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <br>    
                <p class="hidden-print" style='font-size: 50px; color: white'>Pembayaran Berhasil</p>
                <ul><?='<span style="font-size: 16px; color: red">'.Session::get('successMsg').'</span>'?></ul>
                
                <div class="col-md-6 col-md-offset-4" id="tagihan">
                    <div>
                        <span>No. Kartu : {{ $noKartu }}</span>
                    </div>
                    <br>
                    <div>
                        <table class="table" style="width:250px; color: black; text-align: left">
                            <tbody>
                                <tr>
                                    <td>
                                        Saldo Sebelum
                                    </td>
                                    <td>
                                        : Rp. {{ number_format($sebelum) }}
                                    </td>
                                </tr>
                                <tr>    
                                    <td>
                                        Jumlah Top Up
                                    </td>
                                    <td>
                                        : Rp. {{ number_format($jumlah) }}
                                    </td>
                                </tr>
                                <tr>    
                                    <td>
                                        Saldo Sekarang
                                    </td>
                                    <td>
                                        : Rp. {{ number_format($sebelum + $jumlah) }}
                                    </td>
                                </tr>   
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
                <div class="hidden-print col-md-9 col-md-offset-2">
                    <button type="button" class="btn btn-primary" onclick="location.href = '{{ url('cashierMenu') }}';">
                        <i class="glyphicon glyphicon-chevron-left"></i> Back
                    </button>
                    <button style="padding: 10px;" type="submit" class="btn btn-success pull-right" onclick="window.print();">Print</button>
                </div>
            </form>
        </div>
    </body>
</html>