<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Menu Restoran</title>
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
            width:300px;
            height:80px;
            background:white;
            border-color: black;
            border-width: 2px;
            position:fixed;
            top:25%;
            left:50%;
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
            width: 50px;
            height: 50px;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.33;
            border-radius: 25px;
        }

    </style>

    </head>
    
    <!-- BEGIN BODY -->
    <body class="login">
        <form action="{{ url('restoran2/ob') }}" method="post" id="formnya">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="noGelang" value="{{ $noGelang }}">
            <input type="hidden" name="saldo" value="{{ $saldo }}" id="saldo">
            <div class="infototal" style="display:none">
                <table>
                    <tr>
                        <td>Total: </td>
                        <td>Rp. </td>
                        <td><input style="width: 150px;" type="text" id="totaltampil" value="0" disabled></td>
                        <td><input style="width: 150px;" type="hidden" id="totaldinamis" name="totaldinamis" value="0" disabled></td>
                    </tr>
                </table>
                
            </div>

            <div class="content" style="width: 400px; margin: 100px auto;">
                <!-- BEGIN LOGIN FORM -->
                    <!-- BEGIN CRUD TABLE -->
                    @foreach ($errors->all() as $error)
                        <li style='font-size: 16px; color: red'>{{ $error }}</li>
                    @endforeach
                    <div>
                        <table class="table table-hover" style="font-size:20px;">
                            <tbody>
                                @foreach($itemList as $index => $item)
                                <input type="hidden" name="id_item[]" value="{{$item['id_item']}}" />
                                <tr>
                                    <td>
                                         {{ $item['nama'] }}<br>
                                         Rp. {{ number_format($item['price']) }}
                                    </td>
                                    <td >
                                        <!-- <button type="button" id="sub" class="sub btn btn-default btn-circle btn-lg" @if($item['stock'] <= 0) disabled @endif><i class="glyphicon glyphicon-minus"></i></button> -->
                                        <select type="number" 
                                            name="jumlahbeli[]" 
                                            harga="{{ $item['price'] }}" 
                                            style="width: 80px; text-align: center; float: right;"
                                            id="jml">
                                            @for($i = 0; $i <= ($item['stock'] < 15 ? $item['stock'] : 15) ; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <!-- <button type="button" id="add" class="add btn btn-default btn-circle btn-lg" @if($item['stock'] <= 0) disabled @endif><i class="glyphicon glyphicon-plus"></i></button> -->
                                    </td>
                                </tr>
                                @endforeach   
                            </tbody>
                        </table>
                    </div>
                    <!-- END CRUD TABLE -->
                    <div>           
                        <button type="submit" formaction="{{ url('restoran2') }}" class="btn btn-primary">
                            <span class="glyphicon glyphicon-chevron-left"></span> Back To Menu
                        </button>
                        <button type="button" class="submission btn btn-success pull-right">
                            <i class="fa fa-credit-card"></i> Order 
                        </button>
                    </div>
                <!-- END LOGIN FORM -->
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

        $('#jml').on('change', function(){
            var harga = parseInt($(this).attr("harga"),10) ;
            var value = parseInt(this.value, 10);

            $('#totaldinamis').val(harga * value);
            $('#totaltampil').val(numFormat(parseInt($('#totaldinamis').val(),10)));
            cekIsi();

        });

        $('.submission').click(function () {
            var harga = parseInt($('#jml').attr("harga"),10) ;
            var value = parseInt($('#jml').val(), 10);
            if (berisi == true){
                if (harga * value < saldo){
                    $("#formnya").submit();
                }
                else{
                    Alert.render('Saldo anda tidak mencukupi');
                }
            }
            else{
                Alert.render('Anda belum menambah item');
            }
        });

    </script>
</html>