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
                             No. Gelang
                        </th>
                        <th class="customFontSize">
                             No. Terapis
                        </th>
                        <th class="customFontSize">
                             Waktu Mulai
                        </th>
                        <th class="customFontSize">
                             Waktu Selesai
                        </th>
                        <th class="customFontSize">
                             Durasi
                        </th>
                        <th class="customFontSize">
                             Massage + PPN(35%)
                        </th>
                    </tr>
                    </thead>
                    <p class="hidden"> {{ $count = 0 }}</p>
                    <p class="hidden"> {{ $count_refund = 0 }}</p>
                    <tbody>
                    @foreach($itemList as $item)
                    <tr>
                        <td>
                             {{ $item->no_gelang }}
                        </td>
                        <td>
                             {{ $item->no_kartu }}
                        </td>
                        <td>
                             {{ $item->start }}
                        </td>
                        <td>
                             {{ $item->end }}
                        </td>
                        <td>
                             {{ $item->durasi }}
                        </td>
                        <td>
                             Rp. {{ number_format($item->harga) }}
                            <p class="hidden"> {{ $count += $item->harga }}</p>
                        </td>
                        <td class="hidden">
                             {{ $item->refund }}
                            <p> {{ $count_refund += $item->refund }}</p>
                        </td>
                    </tr>    
                    @endforeach
                    <tr>
                        <td>
                            Tanggal Transaksi : {{ $lastDate }}<br>
                            Total Pendapatan : Rp. {{ number_format($count) }}<br>
                            Pendapatan Terapis : Rp. {{ number_format($count_refund*0.1) }}<br>
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



