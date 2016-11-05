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
                        Tambah Pengguna
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ url('admin/pages/pengguna-create') }}" class="form-horizontal" id="createPengguna" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label">Username</label>
                                <div class="col-md-4 input-icon">
                                     <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" autocomplete="off" placeholder="Username" name="username">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Password</label>
                                <div class="col-md-4 input-icon">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control" autocomplete="off" placeholder="Password" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Nama</label>
                                <div class="col-md-4 input-icon">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" placeholder="Nama" name="nama">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Role</label>
                                <div class="col-md-3 control-label">                 
                                    <select name="role" class="form-control">
                            
                                            <option>admin</option>
                                            <option>supervisor</option>
                                            <option>cashier</option>
                                            <option>bar</option>
                                            <option>anton</option>
                                    </select>
                                </div>

                            </div>

                         </div>

                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" onclick="location.href = '{{ url('admin/pages/pengguna') }}';" class="btn btn-default">Cancel</button>
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



