@extends('admin.layout')
@section('title')
Quản lý loại sảm phẩm
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet"
    href="{{ asset('admin/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main')
<a class="btn btn-primary pull-right btn-add" href="{{route('product-type.create')}}"><i class="fa fa-plus"></i> Tạo mới</a>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table id="hrm_list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên loại</th>
                            <th>Đường dẫn</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($types as $type)
                        <tr>
                            <td>{{$type->id}}</td>
                            <td>{{$type->name}}</td>
                            <td>{{$type->slug}}</td>
                            <td>
                                @if ($type->status == 1)
                                <span class="label label-success">Đang sử dụng</span></a>
                                @else
                                <span class="label label-danger">Ngừng sử dụng</span></a>
                                @endif
                            </td>
                            <td>{{$type->created_at->format('d/m/Y')}}</td>
                            <td>
                                <a href="{{route('product-type.edit', ['product_type' => $type->id])}}"><span title="Sửa"
                                        type="button" class="btn btn-flat btn-primary">
                                        <i class="fa fa-edit"></i></span></a>&nbsp;
                                <a class="btn btn-flat btn-danger del-type"
                                    href="javascript:void(0)" data-id="{{$type->id}}" type="button">
                                    <i class="fa fa-trash"></i>
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
    $(".del-type").on('click', function(e){
        e.preventDefault();
        id = $(this).attr('data-id');
        Swal.fire({
            title: 'Warning',
            text: "Bạn có chắc muốn xóa loại sản phẩm này?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })
        .then((result) => {
            if (result.value) {
                var url = '{{ route("product-type.destroy", ":id") }}';
                url = url.replace(':id', id);
                $.ajax({
                    method: 'delete',
                    url: url,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (result) {
                        MenuToast.fire({
                            type: result.status ? 'success' : 'danger',
                            title: result.msg
                        })
                    }
                })
                $(this).parent().parent().remove();
                // deleteMenu(id);
            }
        })
    })
</script>
@endsection