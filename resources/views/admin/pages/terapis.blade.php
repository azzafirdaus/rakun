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
                        Terapis
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                        
                       
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style='font-size: 16px; color: red'>{{ $error }}</li>
                    @endforeach
                </ul>
                <br>
                <!-- BEGIN CRUD TABLE -->
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="btn-group">
                            <button id="sample_editable_1_new" onclick="location.href = '{{ url('admin/pages/terapis-create') }}';" class="btn btn-success">
                            Add New <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-hover customFontSize">
                    <thead>
                    <tr>
                        <th style="font-size:16px;">
                             No. Terapis
                        </th>
                        <th style="font-size:16px;">
                             Nama
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($itemList as $item)
                    <tr>
                        <td>
                             {{ $item->no_kartu }}
                        </td>
                        <td>
                             {{ $item->nama }}
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



