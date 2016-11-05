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
                        Fasilitas
                        </h3>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <br>
                <!-- BEGIN CRUD TABLE -->
                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-hover customFontSize">
                    <thead>
                    <tr>
                        <th style="font-size:16px;">
                             Nama Fasilitas
                        </th>
                        <th style="font-size:16px;">
                             Menit
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
                             {{ $item->nama }}
                            </td>
                            <td>
                             {{ $item->menit }}
                            </td>
                            <td>
                             Rp. {{ number_format($item->harga) }}
                            </td>
                            <td>
                            <form action="{{ url('admin/pages/fasilitas-update') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input class="hidden" type="" autocomplete="off" placeholder="" name="id" value="{{ $item->id_fasilitas }}"/>
                                <button type="submit" class="btn btn-default btn-xs" style="font-size:16px;"><i class="fa fa-edit"></i> Ubah</button>
                                <button type="submit" formaction="{{ url('admin/pages/fasilitas-delete') }}" class="btn btn-default btn-xs" style="font-size:16px;"><i class="fa fa-eraser"></i> Hapus</button>
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



