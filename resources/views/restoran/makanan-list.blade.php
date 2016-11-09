<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Menu Makanan</title>
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
            <form action="{{ url('restoran/makanan') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="noGelang" value="{{ $noGelang }}">
            <input type="hidden" name="saldo" value="{{ $saldo }}" id="saldo">

            <!-- BEGIN LOGIN FORM -->
                <!-- BEGIN CRUD TABLE -->
                @foreach ($errors->all() as $error)
                    <li style='font-size: 16px; color: red'>{{ $error }}</li>
                @endforeach
                <div>
                    <div>
                        <div>
                            <table class="table table-hover" style="font-size:20px;">
                                <thead>
                                    <tr>
                                        <th style="font-size:20px;">
                                            No.
                                        </th>
                                        <th style="font-size:20px;">
                                            Nama
                                        </th>
                                        <th style="font-size:20px;">
                                            Jumlah
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <p type="hidden"><?php $count = 1; ?></p>
                                    
                                    @foreach($makananList as $index => $makanan)
                                    <input type="hidden" name="id_item[]" value="{{$makanan['id_item']}}" />
                                    <tr>
                                        <td>
                                             {{ $count++ }}
                                        </td>
                                        <td>
                                             {{ $makanan['nama'] }}<br>
                                             Rp. {{ number_format($makanan['price']) }}
                                        </td>
                                        <td>
                                            <button type="button" id="sub" class="sub" style="width: 30px">-</button>
                                            <input type="number" value="{{ isset($jumlahbeli[$index])? $jumlahbeli[$index] : 0 }}" min="0" max="{{ $makanan['stock'] }}" name="jumlahbeli[]" harga="{{ $makanan['price'] }}" style="width: 40px; text-align: center;"/>
                                            <button type="button" id="add" class="add" style="width: 30px">+</button>
                                        </td>
                                    </tr>
                                    @endforeach   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END CRUD TABLE -->
                <div>           
                    <button type="submit" formaction="{{ url('restoran') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back To Menu
                    </button>
                    <button type="submit" class="btn btn-success pull-right">
                        <i class="fa fa-credit-card"></i> Order 
                    </button>
                </div>
            <!-- END LOGIN FORM -->
            </form>
        </div>
        <!-- END LOGIN -->
    </body>
    <!-- END BODY -->
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-1.10.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-migrate-1.2.1.min.js') }}"></script>
    <script>
        $('.add').click(function () {
            if ($(this).prev().val() < parseInt($(this).prev().attr("max"),10))
                $(this).prev().val(+$(this).prev().val() + 1);
        });
        $('.sub').click(function () {
            if ($(this).next().val() > 0) 
                $(this).next().val(+$(this).next().val() - 1);
        });
    </script>
</html>