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
                        <h3 class="page-title">
                        Hasil Absen Terapis
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
                             No. Terapis
                        </th>
                        <th>
                             Tanggal
                        </th>
                        <th>
                             Status
                        </th>
                    </tr>
                    </thead>
                    <tbody>                        
                                @foreach($data as $datanya)
                                <tr>
                                    <td>
                                         {{ $datanya['id'] }}
                                    </td>
                                    <td>
                                         {{ $datanya['tanggal'] }}
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success">
                                            Hadir
                                        </span>
                                    </td>
                                </tr>    
                                @endforeach     
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



