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
                        Pendapatan Terapis-{{ $noTerapis }}
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <!-- BEGIN CRUD TABLE -->
                <div class="portlet-body">
                    <div class="table-responsive">
                    <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>
                             Pendapatan
                        </th>
                        <th>
                             Pengeluaran
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                             $5 Million
                        </td>
                        <td>
                             $10 Million
                        </td>   
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    
                </div>
                <!-- END CRUD TABLE -->
            <div class="form-actions fluid">
                <div class="col-md-offset-0">
                    <button type="button" onclick="location.href = '{{ url('admin/pages/terapis-pendapatan') }}';" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
</div>
    <!-- END CONTENT -->
@stop



