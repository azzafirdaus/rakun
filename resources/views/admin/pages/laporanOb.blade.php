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
                    <table id="table" class="table table-hover customFontSize">

                        <thead>
                            <tr>
                                <th class="customFontSize">
                                     No. Terapis
                                </th>
                                <th class="customFontSize">
                                     Jumlah
                                </th>
                            </tr>
                        </thead>
                        <p class="hidden"> {{ $count = 0 }}</p>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>
                                     {{ $item->no_kartu }}
                                </td>
                                <td>
                                    {{ $item->total }}
                                </td>
                            </tr>
                            <p class="hidden"> {{ ($count += $item->total) }}</p>    
                            @endforeach
                        </tbody>
                        <tr>
                            <td>
                                Tanggal Transaksi : {{ $lastDate }}<br>
                                Jumlah OB : {{ $count }}
                            </td>
                        </tr>
                    </table>
                    </div>
                </div>
                <!-- END CRUD TABLE -->
            </div>
        </div>
</div>
    <!-- END CONTENT -->
@stop



