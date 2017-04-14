@extends('admin.layout.default')

@section('sidebar')
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <ul class="page-sidebar-menu">
                    <li class="sidebar-toggler-wrapper">
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <div class="sidebar-toggler">
                        </div>
                        <div class="clearfix">
                        </div>
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    </li>

                    <li class="">
                        <a href="{{ url('admin/pages/dashboard') }}">
                        <i class="fa fa-home"></i>
                        <span class="title">
                            Dashboard
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ url('admin/pages/transaksi-keseluruhan') }}">
                        <i class="fa fa-money"></i>
                        <span class="title">
                            Transaksi Keseluruhan
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>

                    <li class="active">
                        <a href="{{ url('admin/pages/terapis') }}">
                        <i class="fa fa-user"></i>
                        <span class="title">
                            Terapis
                        </span>
                        <span class="selected">
                        </span>
                        <span class="arrow open">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ url('admin/pages/terapis-absen') }}">
                                Absen Terapis</a>
                            </li>
                            <li class="active">
                                <a href="{{ url('admin/pages/terapis-laporan') }}">
                                Laporan Terapis</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/pages/terapis') }}">
                                Terapis</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="">
                        <a href="{{ url('admin/pages/karaoke-laporan') }}">
                        <i class="fa fa-microphone"></i>
                        <span class="title">
                            Karaoke
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ url('admin/pages/bar-laporan') }}">
                        <i class="fa fa-glass"></i>
                        <span class="title">
                            Bar
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>

                     <li class="">
                        <a href="{{ url('admin/pages/pengguna') }}">
                        <i class="fa fa-user"></i>
                        <span class="title">
                            Pengguna
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>                   

                    <li class="">
                        <a href="{{ url('admin/pages/makanan') }}">
                        <i class="fa fa-cutlery"></i>
                        <span class="title">
                            Makanan
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ url('admin/pages/fasilitas') }}">
                        <i class="fa fa-cogs"></i>
                        <span class="title">
                            Fasilitas
                        </span>
                        <span class="">
                        </span>
                        </a>
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
        </div>
    </div>
    <!-- END SIDEBAR -->
@stop

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">
                        Laporan Terapis
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                        <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-success pull-left">
                            <span class="glyphicon glyphicon-download-alt"></span> Export
                        </button>
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <!-- BEGIN CRUD TABLE -->
                <div class="portlet-body">
                    <div class="table-responsive">
                    <table id="table" class="table table-hover">
                    <thead>
                    <tr>
                        <th>
                             No. Gelang
                        </th>
                        <th>
                             No. Terapis
                        </th>
                        <th>
                             Durasi
                        </th>
                        <th>
                             Jumlah Pendapatan
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                             12
                        </td>
                        <td>
                             1234
                        </td>
                        <td>
                             1 Tahun
                        </td>
                        <td>
                            $ 5 Million
                        </td>
                    </tr>
                    <tr>
                        <td>
                             12
                        </td>
                        <td>
                             1234
                        </td>
                        <td>
                             1 Tahun
                        </td>
                        <td>
                            $ 5 Million
                        </td>
                    </tr>
                    <tr>
                        <td>
                             12
                        </td>
                        <td>
                             1234
                        </td>
                        <td>
                             1 Tahun
                        </td>
                        <td>
                            $ 5 Million
                        </td>
                    </tr>
                    </tbody>
                    </table>
                    <div>
                        <span>
                            Total Pengunjung :
                        </span>
                        <br>
                        <br>
                        <span>
                            Total Pendapatan :
                        </span>
                    </div>
                    </div>
                    
                </div>
                <!-- END CRUD TABLE -->
            </div>
        </div>
</div>
    <!-- END CONTENT -->
@stop



