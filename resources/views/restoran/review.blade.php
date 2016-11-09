<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Restoran</title>
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
            <div class="well" style="font-size:20px">
                <div class="table-responsive">
                <h3 class="form-title" style='font-size: 32px;'>Review Order</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                     #
                                </th>
                                <th>
                                     Makanan/Minuman
                                </th>
                                <th>
                                     Jumlah
                                </th>
                                <th>
                                     Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <p class="hidden">{{ $count = 1 }}</p>
                            @foreach($pesanan as $index => $item)
                            <tr>
                                <td>
                                     {{ $count++ }}
                                </td>
                                <td>
                                     {{ $item['nama'] }} <br>
                                     @ Rp. {{ number_format($item['price']) }}
                                </td>
                                <td>
                                     {{ $item['qty']}}
                                </td>
                                <td>
                                     Rp. {{ number_format($item['jumlah'])}}
                                </td>
                            </tr>    
                            @endforeach     
                        </tbody>
                    </table>
                </div>
            </div>
            
            <br>
            <form method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input class="hidden" name="noGelang" value="{{ $noGelang }}">
                @foreach($iditem as $value1)
                <input type="hidden" name="id_item[]" value="{{ $value1 }}">
                @endforeach
                @foreach($jumlahbeli as $value2)
                <input type="hidden" name="jumlahbeli[]" value="{{ $value2 }}">
                @endforeach
                <div class="form-actions hidden-print">
                    <div class="pull-left">
                        <button type="submit" formaction="{{ url('restoran') }}" class="btn btn-primary">
                            <span class="glyphicon glyphicon-chevron-left"></span> Kembali
                        </button>
                    </div>
                    <div class="pull-right">
                        <button type="submit" formaction="{{ url('restoran/makanan/order') }}" class="btn btn-success">
                            <span class="glyphicon glyphicon-check"></span> Order
                        </button>
                    </div>
                </div>
            </form>  
        </div>
        <!-- END LOGIN -->
    </body>
<!-- END BODY -->
</html>