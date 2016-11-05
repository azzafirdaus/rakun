@extends('admin.layout.sidebar')

@section('sidebar')
    @parent
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
                        <h3 class="page-title" style="font-size:28px;">
                        Transaksi Keseluruhan
                        </h3>
                        <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-success pull-left">
                            <span class="glyphicon glyphicon-download-alt"></span> Export
                        </button>  
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                
                <!-- END PAGE HEADER-->
                <br>
                <!-- BEGIN CRUD TABLE -->
                <div class="portlet-body">
                    <div class="table-responsive">
                    <table id="table" class="table table-hover customFontSize">

                        <thead>
                        <tr>
                            <th class="customFontSize">
                                 Divisi
                            </th>
                            <th class="customFontSize">
                                 Total Pendapatan
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>
                                 Bar Lantai 2
                            </td>
                            <td>
                                 Rp. {{ number_format($totalBar) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 Bar Lantai 3
                            </td>
                            <td>
                                 Rp. {{ number_format($totalBar2) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 Bar Lantai 4
                            </td>
                            <td>
                                 Rp. {{ number_format($totalBar3) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 Terapis
                            </td>
                            <td>
                                 Rp. {{ number_format($totalMassage) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 Karaoke
                            </td>
                            <td>
                                 Rp. {{ number_format($totalKaraoke) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tanggal Transaksi : {{ $lastDate }}
                            </td>
                            <td>
                                Total Pendapatan : Rp. {{ number_format($totalBar + $totalBar2 + $totalBar3 + $totalMassage + $totalKaraoke) }}
                            </td>   
                        </tr>
                        </tbody>

                    </table>


                    <br>  
                
                    
                </div>
                <!-- END CRUD TABLE -->
            </div>
        </div>
</div>
    <!-- END CONTENT -->
@stop



