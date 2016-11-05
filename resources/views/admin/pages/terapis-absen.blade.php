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
                        Absen Terapis
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ url('admin/pages/terapis-absen-hasil') }}" class="form-horizontal" id="absenTerapis" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Start Date</label>
                                <div class="col-md-4 input-icon">
                                    <i class="fa fa-calendar"></i>
                                    <input type="date" class="form-control" name="startDate">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">End Date</label>
                                <div class="col-md-4 input-icon">
                                    <i class="fa fa-calendar"></i>
                                    <input type="date" class="form-control" name="endDate">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
</div>
    <!-- END CONTENT -->
@stop



