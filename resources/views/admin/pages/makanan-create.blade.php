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
                        Tambah Makanan
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ url('admin/pages/makanan-create') }}" class="form-horizontal" id="createMakanan" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label">Id Item</label>
                                <div class="col-md-4 input-icon">
                                     <i class="fa fa-tag"></i>
                                    <input type="text" class="form-control" autocomplete="off" placeholder="Id Item" name="id">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Nama Item</label>
                                <div class="col-md-4 input-icon">
                                     <i class="fa fa-tag"></i>
                                    <input type="text" class="form-control" autocomplete="off" placeholder="Nama Item" name="nama">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Harga</label>
                                <div class="col-md-4 input-icon">
                                    <i class="fa fa-money"></i>
                                    <input type="text" class="form-control" placeholder="Harga" name="price">
                                </div>
                            </div>

                         </div>

                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" onclick="location.href = '{{ url('admin/pages/makanan') }}';" class="btn btn-default">Cancel</button>
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



