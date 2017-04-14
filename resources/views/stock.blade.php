<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Stock</title>
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
            <!-- BEGIN LOGIN FORM -->
                <h3 class="form-title" style='font-size: 38px;'>Stock</h3>
                    
                <!-- BEGIN CRUD TABLE -->
                <div>
                    <div>
                        <div>
                            <table class="table table-hover" style="font-size:20px;">
                                <thead>
                                    <tr>
                                        <th style="font-size:20px;">
                                            Nama
                                        </th>
                                        <th style="font-size:20px;">
                                            Jumlah
                                        </th>

                                    </tr>
                                </thead>
                            <tbody>
                            
                                
                                @foreach($itemList as $item)
                    <tr>
                        <td>
                             {{ $item->nama }}
                        </td>
                        <td>
                             {{ $item->stock }}
                        </td>
                        <td>
                            <form action="{{ url('stock') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input class="hidden" type="" autocomplete="off" placeholder="" name="nama" value="{{ $item->nama }}"/>
                                <button type="submit" class="btn btn-default btn-xs" style="font-size:16px;"><i class="fa fa-edit"></i> Add</button>
                                <button type="submit" formaction="{{ url('itemDelete') }}" class="btn btn-default btn-xs hidden" style="font-size:16px;"><i class="fa fa-eraser"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>    
                    @endforeach   
                            
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- END CRUD TABLE -->
                <div class="form-actions hidden-print">
                    <button type="button" onclick="location.href = '{{ url('cashierMenu') }}';" class="btn btn-primary">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back To Cashier
                    </button>
                    <button type="button" class="btn btn-success pull-right" onclick="window.print();">
                        <i class="fa fa-print"></i> Print 
                    </button>
                </div>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->
    </body>
<!-- END BODY -->
</html>