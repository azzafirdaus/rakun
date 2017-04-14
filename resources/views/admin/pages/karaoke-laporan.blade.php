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
                        Laporan Karaoke
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
                            <th style="font-size:16px;">
                                 No
                            </th>
                            <th style="font-size:16px;">
                                 No. Customer
                            </th>
                            <th style="font-size:16px;">
                                 No. Room
                            </th>
                            <th style="font-size:16px;">
                                 Durasi
                            </th>
                            <th style="font-size:16px;">
                                 Harga (+PPN 25%)
                            </th>
                        </tr>
                        </thead>
                        <p class="hidden">{{ $count = 0 }}</p>
                        <p class="hidden">{{ $no = 1 }}</p>
                        <tbody>
                        @foreach($itemList as $item)
                    <tr>
                        <td>
                             {{ $no++ }}
                        </td>
                        <td>
                             {{ $item->no_gelang }}
                        </td>
                        <td>
                             {{ $item->ruang }}
                        </td>
                        <td>
                             {{ $item->durasi }}
                        </td>
                        <td>
                             Rp. {{ number_kasih($item->harga) }}
                            <p class="hidden">{{ $count += $item->harga }}</p>
                        </td>
                    </tr>    
                    @endforeach
                    <tr>
                        <td>
                            Tanggal Transaksi : {{ $lastDate }}<br>
                            Total Transaksi : Rp. {{ number_format($count) }}
                        </td>
                    </tr>
                        </tbody>

                    </table>
                    </div>
                    
                </div>
                <!-- END CRUD TABLE -->
            </div>
        </div>
</div>
    <!-- END CONTENT -->
@stop



