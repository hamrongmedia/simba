@extends('admin.layout')
@section('title')
Quản lý danh mục sản phẩm
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet"
    href="{{ asset('admin/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main')
<a class="btn btn-primary pull-right btn-add" href="{{route('product-category.create')}}"><i class="fa fa-plus"></i> Tạo mới</a>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table id="hrm_list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Đường dẫn</th>
                            <th>Danh mục cha</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{isset($category->parent_category) ? $category->parentCategory->name : 'Không có'}}</td>
                            <td>
                                @if ($category->status == 1)
                                <span class="label label-success">Đang sử dụng</span></a>
                                @else
                                <span class="label label-danger">Ngừng sử dụng</span></a>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('product-category.edit', ['product_category'=>$category->id])}}"><span title="Sửa"
                                        type="button" class="btn btn-flat btn-primary">
                                        <i class="fa fa-edit"></i></span></a>&nbsp;
                                <a class="btn btn-flat btn-danger"
                                    href="{{ route('product-category.destroy',$category->id) }}" type="button">
                                    <i class="fa fa-trash"></i>
                                    </a>
                                    <a class="btn btn-flat btn-danger"
                                        href="{{ route('product-category.show',$category->id) }}" type="button">
                                        <i class="fa fa-list"></i>
                                    </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@endsection

@section('js')
<!-- DataTables -->
<script src="{{ asset('admin/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(function () {
        $('#hrm_list').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
        })
        // $("#hrm_list_filter").prepend('<a class="btn btn-primary" href="{{route('product-category.create')}}"><i class="fa fa-plus"></i> Tạo mới</a>');
    })
</script>
@endsection