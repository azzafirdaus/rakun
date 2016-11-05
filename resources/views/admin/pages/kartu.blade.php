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
                        Kartu
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
                             No.
                        </th>
                        <th style="font-size:16px;">
                             No. Kartu
                        </th>
                        <th style="font-size:16px;"> 
                             Tanggal
                        </th>
                        <th style="font-size:16px;"> 
                             Transaksi
                        </th>
                        <th style="font-size:16px;">
                             Jumlah
                        </th>
                        <th style="font-size:16px;">
                             Nama Kasir
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <p class="hidden">{{ $count = 1 }}</p>
                    <p class="hidden">{{ $jumlah = 0 }}</p>
                    <p class="hidden">{{ $reg = 0 }}</p>
                    @foreach($data as $datanya)
                    <tr>
                        <td>
                            {{ $count++ }}
                        </td>
                        <td>
                            {{ $datanya->id_gelang }}
                        </td>
                        <td>
                            {{ $datanya->waktu }}
                        </td>
                        <td>
                            {{ $datanya->jenis }}
                        </td>
                        <td>
                            Rp. {{ number_format($datanya->total) }}
                        </td>
                        <td>
                            {{ $datanya->nama_kasir }}
                        </td>
                    <p class="hidden">{{ $jumlah += $datanya->total }}</p>
                    <p class="hidden"><?php if($datanya->jenis == 'Registrasi'){$reg++;}; ?></p>
                    </tr> 
                    @endforeach
                    <tr>
                        <td colspan="6">
                            Total : Rp. {{ number_format($jumlah) }} <br>
                            Total Registrasi: {{ $reg }}
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



