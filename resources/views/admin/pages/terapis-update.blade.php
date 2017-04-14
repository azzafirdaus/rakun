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
                        Ubah Data Terapis
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ url('admin/pages/terapis-update') }}" class="form-horizontal" method="get">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="form-body">
            
                            <input type="" class="hidden" placeholder="" value="" name="id">
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">No. Kartu</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="No. Kartu" value="" name="noKartu">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tgl. Lahir</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Tgl. Lahir" value="" name="tglLahir">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" onclick="location.href = '{{ url('admin/pages/terapis') }}';" class="btn btn-default">Cancel</button>
                                <button type="onclick" class="btn btn-success">Submit</button>
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



