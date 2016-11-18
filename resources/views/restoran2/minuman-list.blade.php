<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Menu Restoran 2</title>
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
    
    <style type="text/css">
        .infototal{
            width:450px;
            height:70px;
            background:white;
            border-color: black;
            border-width: 2px;
            position:fixed;
            top:20%;
            left:45%;
            margin-top:-150px; /* negative half the size of height */
            margin-left:-150px; /* negative half the size of width */
        }
        .infototal table{
            margin: 20px;
        }
        .infototal table td{
            font-size: 25px;        
        }

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

        #alert_button {
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
        .btn-circle.btn-lg {
            width: 30px;
            height: 30px;
            padding: 5px 8px;
            font-size: 9px;
            line-height: 1.33;
            border-radius: 25px;
        }
        input
        {
            background: transparent;
            border: none;
        }

    </style>

    </head>
    
    <!-- BEGIN BODY -->
    <body class="login">
        <!-- BEGIN LOGIN -->
        <form action="{{ url('restoran2/minuman') }}" method="post" id="formnya">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="noGelang" value="{{ $noGelang }}">
            <input type="hidden" name="saldo" value="{{ $saldo }}" id="saldo">
            
            @foreach ($errors->all() as $error)
                <li style='font-size: 16px; color: red'>{{ $error }}</li>
            @endforeach

            <div class="infototal" style="display:none">
                <table>
                    <tr>
                        <td>Total: </td>
                        <td>Rp. </td>
                        <td><input style="width: 200px;" type="text" id="totaltampil" value="{{ isset($totaldinamis)? $totaldinamis: 0 }}" disabled></td>
                        <td>
                            <button type="button" class="submission btn btn-success pull-right">
                                <i class="fa fa-credit-card"></i> Order 
                            </button>
                        </td>
                        <td><input style="width: 150px;" type="hidden" id="totaldinamis" name="totaldinamis" value="{{ isset($totaldinamis)? $totaldinamis: 0 }}" disabled></td>
                    </tr>
                </table>
            </div>
            <div class="content" style="width: 420px; @if(isset($itemList[14]))float: left; margin: 70px 3px 3px 3px; @else margin: 70px auto 3px; @endif" >
                <!-- BEGIN CRUD TABLE -->
                <table class="table table-hover" style="font-size:12px;">
                    <tbody>
                        @foreach(array_slice($itemList, 0, 14) as $index => $item)
                        <input type="hidden" name="id_item[]" value="{{$item['id_item']}}" />
                        <tr>
                            <td>
                                 {{ $item['nama'] }}<br>
                                 Rp. {{ number_format($item['price']) }}
                            </td>
                            <td>
                                <button type="button" id="sub" class="sub btn btn-default btn-circle btn-lg" @if($item['stock'] <= 0) disabled @endif><i class="glyphicon glyphicon-minus"></i></button>
                                <input type="number" value="{{ isset($jumlahbeli[$index])? $jumlahbeli[$index] : 0 }}" min="0" max="{{ $item['stock'] }}" name="jumlahbeli[]" harga="{{ $item['price'] }}" style="width: 40px; text-align: center;" />
                                <button type="button" id="add" class="add btn btn-default btn-circle btn-lg" @if($item['stock'] <= 0) disabled @endif><i class="glyphicon glyphicon-plus"></i></button>
                            </td>
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
            </div>
            @if(isset($itemList[15]))
            <div class="content" style="float: left; width: 420px; margin: 70px 3px 3px 3px;">
                <!-- BEGIN CRUD TABLE -->
                <table class="table table-hover" style="font-size:12px;">
                    <tbody>
                        @foreach(array_slice($itemList, 15, 14) as $index => $item)
                        <input type="hidden" name="id_item[]" value="{{$item['id_item']}}" />
                        <tr>
                            <td>
                                 {{ $item['nama'] }}<br>
                                 Rp. {{ number_format($item['price']) }}
                            </td>
                            <td>
                                <button type="button" id="sub" class="sub btn btn-default btn-circle btn-lg" @if($item['stock'] <= 0) disabled @endif><i class="glyphicon glyphicon-minus"></i></button>
                                <input type="number" value="{{ isset($jumlahbeli[$index])? $jumlahbeli[$index] : 0 }}" min="0" max="{{ $item['stock'] }}" name="jumlahbeli[]" harga="{{ $item['price'] }}" style="width: 40px; text-align: center;" />
                                <button type="button" id="add" class="add btn btn-default btn-circle btn-lg" @if($item['stock'] <= 0) disabled @endif><i class="glyphicon glyphicon-plus"></i></button>
                            </td>
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
                <!-- END CRUD TABLE -->
            </div>
            @endif
            @if(isset($itemList[29]))
            <div class="content" style="float: left; width: 420px; margin: 70px 3px 3px 3px;">
                <!-- BEGIN CRUD TABLE -->
                <table class="table table-hover" style="font-size:12px;">
                    <tbody>                        
                        @foreach(array_slice($itemList, 29, 14) as $index => $item)
                        <input type="hidden" name="id_item[]" value="{{$item['id_item']}}" />
                        <tr>
                            <td>
                                 {{ $item['nama'] }}<br>
                                 Rp. {{ number_format($item['price']) }}
                            </td>
                            <td>
                                <button type="button" id="sub" class="sub btn btn-default btn-circle btn-lg" @if($item['stock'] <= 0) disabled @endif><i class="glyphicon glyphicon-minus"></i></button>
                                <input type="number" value="{{ isset($jumlahbeli[$index])? $jumlahbeli[$index] : 0 }}" min="0" max="{{ $item['stock'] }}" name="jumlahbeli[]" harga="{{ $item['price'] }}" style="width: 40px; text-align: center;" />
                                <button type="button" id="add" class="add btn btn-default btn-circle btn-lg" @if($item['stock'] <= 0) disabled @endif><i class="glyphicon glyphicon-plus"></i></button>
                            </td>
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
                <!-- END CRUD TABLE -->
            </div>
            @endif
            <div>           
                <button type="submit" formaction="{{ url('restoran2') }}" class="btn btn-primary">
                    <span class="glyphicon glyphicon-chevron-left"></span> Back To Menu
                </button>
            </div>
        </form>

        <div id="dialogoverlay"></div>
        <div id="dialogbox">
            <div>
                <!-- <div id="dialogboxhead"></div> -->
                <div id="dialogboxbody"></div>
                <div id="dialogboxfoot"></div>
            </div>
        </div>
        <!-- END LOGIN -->
    </body>
    <!-- END BODY -->
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-1.10.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-migrate-1.2.1.min.js') }}"></script>
    <script>
        var saldo = $('#saldo').val();
        var berisi = false;

        function CustomAlert(){
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
                document.getElementById('dialogboxfoot').innerHTML = '<button style="margin-right: 40px; float: right;" id="alert_button" onclick="Alert.ok()">OK</button>';
            }
            this.ok = function(){
                document.getElementById('dialogbox').style.display = "none";
                document.getElementById('dialogoverlay').style.display = "none";
                // document.getElementById("pelanggan-barcode").focus();
            }
        }
        var Alert = new CustomAlert();

        function numFormat(val){
            while (/(\d+)(\d{3})/.test(val.toString())){
                val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
            }
            return val;
        }

        function cekIsi(){
            var isi = parseInt($('#totaldinamis').val(),10);
            if(isi > 0){
                $('.infototal').fadeIn();
                berisi = true;
            }
            else{
                $('.infototal').fadeOut();
                berisi = false;
            }
        }

        $('.add').click(function () {
            if ($(this).prev().val() < parseInt($(this).prev().attr("max"),10)){
                var jumlah = parseInt($(this).prev().attr("harga"),10);

                if((parseInt($('#totaldinamis').val(),10) + jumlah) <= saldo){
                    $(this).prev().val(+$(this).prev().val() + 1);
                    $('#totaldinamis').val(+$('#totaldinamis').val() + jumlah);
                    $('#totaltampil').val(numFormat(parseInt($('#totaldinamis').val(),10)));
                }
                else{
                    Alert.render('Saldo anda tidak mencukupi');
                    //alert("saldo anda sebesar "+numFormat(saldo)+" tidak mencukupi");
                }
                cekIsi();
            }
        });

        $('.sub').click(function () {
            if ($(this).next().val() > 0){
                var jumlah = parseInt($(this).next().attr("harga"),10);
                
                $(this).next().val(+$(this).next().val() - 1);
                $('#totaldinamis').val(+$('#totaldinamis').val() - jumlah);
                $('#totaltampil').val(numFormat(parseInt($('#totaldinamis').val(),10)));
                cekIsi();
            } 
        });

        $('.submission').click(function () {
            if (berisi == true){
                $("#formnya").submit();
            }
            else{
                Alert.render('Anda belum memilih item');
            }
        });


    </script>
</html>