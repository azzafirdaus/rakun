<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Restoran3</title>
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
        <style type="text/css">
        #dialogoverlay{
            display: none;
            opacity: .2;
            position: fixed;
            top: 0px;
            left: 0px;
            background: #FFF;
            width: 100%;
            z-index: 10;
        }
        #dialogbox{
            display: none;
            position: fixed;
            background: white;
            width: 750px;
            border-radius:4px;
            height: 300px;
            z-index: 10;
        }
        #dialogbox > div{ background:white; margin:8px; }
        /*#dialogbox > div > #dialogboxhead{ background: white; font-size:30px; padding:10px; color:black; }*/
        #dialogbox > div > #dialogboxbody{ background: white; font-size:40px; padding:40px 20px; text-align:center; color:black; }
        #dialogbox > div > #dialogboxfoot{ background: white; padding:10px; margin-top: 30px;text-align:center; }

        #confirm_button {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            border-radius:2px;
            width: 150px;
            text-decoration: none;
            display: inline-block;
            font-size: 30px;
        }
        </style>
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
                                <td>
                                    <form method="post">
                                        @foreach($iditem as $value1)
                                        <input type="hidden" name="id_item[]" value="{{ $value1 }}">
                                        @endforeach
                                        @foreach($jumlahbeli as $value2)
                                        <input type="hidden" name="jumlahbeli[]" value="{{ $value2 }}">
                                        @endforeach
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="noGelang" value="{{ $noGelang }}">
                                        <input type="hidden" name="idarray" value="{{ $item['index'] }}"/>
                                        <button type="submit" formaction="{{ url('restoran3/minuman/delete') }}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>    
                            @endforeach     
                        </tbody>
                    </table>
                </div>
            </div>
            
            <br>
            <form action="{{ url('restoran3') }}" method="post" id="formnya">
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
                        <button type="button" onclick="Confirm.render('Apakah anda yakin?')" class="btn btn-primary">
                            <span class="glyphicon glyphicon-chevron-left"></span> Back To Menu
                        </button>
                    </div>
                    <div class="pull-right">
                        <button type="submit" formaction="{{ url('restoran3/minuman/order') }}" class="btn btn-success">
                            <span class="glyphicon glyphicon-check"></span> Order
                        </button>
                    </div>
                </div>
            </form>  
        </div>
        <!-- END LOGIN -->
        <div id="dialogoverlay"></div>
        <div id="dialogbox">
            <div>
                <!-- <div id="dialogboxhead"></div> -->
                <div id="dialogboxbody"></div>
                <div id="dialogboxfoot"></div>
            </div>
        </div>
    </body>
<!-- END BODY -->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-1.10.2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript">
    function CustomConfirm(){
        this.render = function(dialog){
            var winW = window.innerWidth;
            var winH = window.innerHeight;
            var dialogoverlay = document.getElementById('dialogoverlay');
            var dialogbox = document.getElementById('dialogbox');
            dialogoverlay.style.display = "block";
            dialogoverlay.style.height = winH+"px";
            dialogbox.style.left = (winW/2) - (750 * .5)+"px";
            dialogbox.style.top = "120px";
            dialogbox.style.display = "block";
            
            // document.getElementById('dialogboxhead').innerHTML = "Kembali ke menu awal";
            document.getElementById('dialogboxbody').innerHTML = dialog;
            document.getElementById('dialogboxfoot').innerHTML = '<button id="confirm_button" style="margin-right: 40px" onclick="Confirm.yes()">YA</button> <button style="margin-left: 40px" id="confirm_button" onclick="Confirm.no()">TIDAK</button>';
        }
        this.no = function(){
            document.getElementById('dialogbox').style.display = "none";
            document.getElementById('dialogoverlay').style.display = "none";
        }
        this.yes = function(){            
            $('#formnya').submit();
        }
    }
    var Confirm = new CustomConfirm();
</script>
</html>