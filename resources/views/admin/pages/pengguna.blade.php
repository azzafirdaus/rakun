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
                        Pengguna
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <!-- BEGIN CRUD TABLE -->
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="btn-group">
                            <button id="sample_editable_1_new" onclick="location.href = '{{ url('admin/pages/pengguna-create') }}';" class="btn btn-success">
                            Add New <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-hover customFontSize">
                    <thead>
                    <tr>
                        <th style="font-size:16px;">
                             Username
                        </th style="font-size:16px;">
                        <th style="font-size:16px;">
                             Nama
                        </th>
                        <th style="font-size:16px;"> 
                             Password
                        </th>
                        <th style="font-size:16px;">
                             Role
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accountList as $account)
                    <tr>
                        <td>
                             {{ $account->username }}
                        </td>
                        <td>
                             {{ $account->nama }}
                        </td>
                        <td>
                             {{ $account->password }}
                        </td>
                        <td>
                             {{ $account->role }}
                        </td>
                        <td>
                            <form action="{{ url('admin/pages/pengguna-update') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input class="hidden" type="" autocomplete="off" placeholder="" name="id" value="{{ $account->id }}"/>
                                <button type="submit" class="btn btn-default btn-xs" style="font-size:16px;"><i class="fa fa-edit"></i> Ubah</button>
                                <button type="submit" formaction="{{ url('admin/pages/pengguna-delete') }}" class="btn btn-default btn-xs" style="font-size:16px;"><i class="fa fa-eraser"></i> Hapus</button>
                            </form>
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



