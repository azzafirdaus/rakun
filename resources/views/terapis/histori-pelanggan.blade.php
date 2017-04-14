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
  <!--  <div class="logo">
            <img src="assets/img/logo.png" alt=""/>
        </div> -->
        <!-- END LOGO -->

        <div class="home-button">
            <form class="terapis-form"> 
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="noGelang" value="{{ $nama }}">

                <p style='font-size: 100px; color: white'>{{ $success }}</p>
                
                <!-- <h3 class="form-title" style='font-size: 38px;'>Terapis Naik</h3> -->
                @foreach ($errors->all() as $error)
                    <li style='font-size: 16px; color: white'>{{ $error }}</li>
                @endforeach
  
                <ul><?='<span style="font-size: 16px; color: red">'.Session::get('successMsg').'</span>'?></ul>

            </form>

            <div class="col-md-6 col-md-offset-3">
                <div class="table-responsive">
                    <table id="table" class="table customFontSize histori" style="color: white;">
                        <thead>
                            <tr>
                                <th style="font-size:20px;">
                                     No.
                                </th>
                                <th style="font-size:20px;"> 
                                     Tanggal
                                </th>
                                <th style="font-size:20px;"> 
                                     Jam
                                </th>
                                <th style="font-size:20px;"> 
                                     Transaksi
                                </th>
                                <th style="font-size:20px;">
                                     Jumlah
                                </th>
                            </tr>
                        </thead>
                        <tbody style="text-align:left;">
                            <p class="hidden">{{ $count = 1 }}</p>
                            <p class="hidden">{{ $jumlah = 0 }}</p>
                            @foreach($data as $datanya)
                            <tr>
                                <td style="font-size:20px;">
                                    {{ $count++ }}
                                </td>
                                <td style="font-size:20px;">
                                    {{ date('d/m/Y', strtotime($datanya->tanggal)) }}
                                </td>
                                <td style="font-size:20px;">
                                    {{ date('H:m:s', strtotime($datanya->tanggal)) }}
                                </td>
                                <td style="font-size:20px;">
                                    {{ $datanya->jenis }}
                                </td>
                                <td style="font-size:20px;">
                                    {{ number_format($datanya->Total) }}
                                </td>
                            <p class="hidden">{{ $jumlah += $datanya->Total }}</p>
                            </tr> 
                            @endforeach   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <div class="row-fluid">
            <span class="col-md-4 col-md-offset-1">
                <p style='font-size: 30px; color: white; text-align: left;'>SALDO ANDA : Rp. {{ number_format($saldo) }}</p>
            
            </span>
            <span class="col-md-2 col-md-offset-2" style="margin-right: 30px;">
                <button type="button" style="height: 60px; font-size: 30px;" onclick="Confirm.render('Anda yakin ingin kembali?')" class="btn btn-primary">
                    <span class="glyphicon glyphicon-chevron-left"></span> Kembali ke Menu Awal
                </button>
            </span> 
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
            location.href = '{{ url('menuPelanggan') }} ';
        }
    }
    var Confirm = new CustomConfirm();
    </script>
<!-- END BODY -->
</html>