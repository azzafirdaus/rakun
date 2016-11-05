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
                        Makanan
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                       
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style='font-size: 16px; color: red'>{{ $error }}</li>
                    @endforeach
                </ul>
                <!-- END PAGE HEADER-->
                <br>
                <!-- BEGIN CRUD TABLE -->
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="btn-group">
                            <button id="sample_editable_1_new" onclick="location.href = '{{ url('admin/pages/makanan2-create') }}';" class="btn btn-success">
                            Add New <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover customFontSize">
                    <thead>
                    <tr>
                        <th style="font-size:16px;">
                             Id Item
                        </th>
                        <th style="font-size:16px;">
                             Nama Item
                        </th>
                        <th style="font-size:16px;">
                             Harga
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($itemList as $item)
                    <tr>
                        <td>
                             {{ $item->id_item }}
                        </td>
                        <td>
                             {{ $item->nama }}
                        </td>
                        <td>
                             {{ $item->price }}
                        </td>
                        <td>
                            <form action="{{ url('admin/pages/makanan2-update') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input class="hidden" type="" autocomplete="off" placeholder="" name="id" value="{{ $item->id_item }}"/>
                                <button type="submit" class="btn btn-default btn-xs" style="font-size:16px;"><i class="fa fa-edit"></i> Ubah</button>
                                <button type="submit" formaction="{{ url('admin/pages/makanan2-delete') }}" class="btn btn-default btn-xs" style="font-size:16px;"><i class="fa fa-eraser"></i> Hapus</button>
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



