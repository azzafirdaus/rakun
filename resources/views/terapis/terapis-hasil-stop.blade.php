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

        <div class="home-button">
            <form class="terapis-form"> 
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="noGelang" value="{{ $nama }}">

                <!-- <h3 class="form-title" style='font-size: 38px;'>Terapis Naik</h3> -->
                @foreach ($errors->all() as $error)
                    <li style='font-size: 16px; color: white'>{{ $error }}</li>
                @endforeach

                <br>    
                <p style='font-size: 120px; color: white'>{{ $success }}</p>
                <p class="col-md-6 col-md-offset-4" style='font-size: 30px; color: white; text-align: left;'>Mulai Jam: {{ $start }}</p>
                <p class="col-md-6 col-md-offset-4" style='font-size: 30px; color: white; text-align: left;'>Stop Jam: {{ $end }}</p>
                <ul><?='<span style="font-size: 16px; color: red">'.Session::get('successMsg').'</span>'?></ul>

            </form>
        </div>

    <script>
        window.onload = function() {
            setTimeout(function(){ location.href = "{{ url('konfirmasiStopPelanggan') }} "; }, 3000);
        };
    </script>

        <!-- END LOGIN -->
    </body>
<!-- END BODY -->
</html>