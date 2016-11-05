<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Terapis Auto Menu</title>
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
    
    <!-- BEGIN BODY -->
    <body class="terapis">
        <!-- BEGIN LOGO -->
        <div class="logo">
        <!--<img src="assets/img/logo.png" alt=""/>-->
        </div>
        <!-- END LOGO -->
        <p style='font-size: 70px; color: white; text-align: center;'>KARTU TERAPIS</p>
        <br>
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->

            <form class="terapis-form" action="{{ url('terapisStop') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="noGelang" value="{{ $nama }}">

                    @foreach ($errors->all() as $error)
                        <li style='font-size: 16px; color: red'>{{ $error }}</li>
                    @endforeach
                
                <br>    
                
                    <p style='font-size: 16px; color: green'>{{ $success }}</p>
                <ul><?='<span style="font-size: 16px; color: red">'.Session::get('successMsg').'</span>'?></ul>
                
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-barcode fa-fw" style="font-size: 2em"></i>
                        </span>
                        <input id="terapis-barcode" class="form-control placeholder-no-fix" type="text" style='font-size: 24px;' autocomplete="off" placeholder="Masukan No. Terapis" name="password" autofocus/>
                    </div>
                </div>                
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->

        <div class="col-md-2 col-md-offset-3" style="margin-top:30px;">
            <button type="button" style="height: 60px; font-size: 30px;" onclick="Confirm.render('Anda yakin ingin kembali?')" class="btn btn-primary">
                <span class="glyphicon glyphicon-chevron-left"></span> Kembali ke Menu Awal
            </button>
        </div>

    <div id="dialogoverlay"></div>
    <div id="dialogbox">
        <div>
            <!-- <div id="dialogboxhead"></div> -->
            <div id="dialogboxbody"></div>
            <div id="dialogboxfoot"></div>
        </div>
    </div>
    
    </body>

    <script>
    window.onload = function() {
      var input = document.getElementById("terapis-barcode").focus();
    }

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
            document.getElementById("pelanggan-barcode").focus();
        }
        this.yes = function(){            
            location.href = '{{ url('menuTerapis') }} ';
        }
    }
    var Confirm = new CustomConfirm();
    </script>

<!-- END BODY -->
</html>