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
                        Ubah Data Makanan
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ url('admin/pages/makanan3-update') }}" class="form-horizontal" method="get">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="form-body">
            
                            <input type="" class="hidden" placeholder="" value="{{ $id }}" name="id">
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nama Item</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Enter text" value="{{ $nama }}" name="nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Harga</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Enter text" value="{{ $price }}" name="price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Jenis</label>
                                <div class="col-md-3 control-label">                 
                                    <select name="jenis" class="form-control" value="{{ $jenis }}">
                                            <option></option>
                                            <option>Makanan</option>
                                            <option>Minuman</option>
                                            <option>Rokok</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" onclick="location.href = '{{ url('admin/pages/makanan3') }}';" class="btn btn-default">Cancel</button>
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



