@extends('admin.layout')
@section('title')
Quản lý danh mục sản phẩm
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet"
    href="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
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
                                <td><a href="{{route('product.getProductByCat', $category->slug)}}">{{$category->name}}</a>   </td>
                                <td>{{$category->slug}}</td>
                                <td>{{isset($category->parent_category) ? $category->parentCategory->name : 'Không có'}}</td>
                                <td>
                                    {!! \App\Helpers\Common::deleteFlag($category->is_deleted) !!}
                                </td>
                                <td>
                                    <a href="{{route('product-category.edit', ['product_category'=>$category->id])}}"><span title="Sửa"
                                            type="button" class="btn btn-flat btn-primary">
                                            <i class="fa fa-edit"></i></span></a>&nbsp;
                                    @if ($category->is_deleted == 0)
                                        <a class="btn btn-flat btn-danger del-category" data-id="{{$category->id}}"
                                            href="javascript:void(0)" type="button">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endif
                                    @if ($category->is_deleted == 1)
                                        <a class="btn btn-flat btn-success restore-category" onclick="restoreItem({{$category->id}})"
                                            href="javascript:void(0)" type="button">
                                            <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </a>
                                    @endif
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
<script src="{{ asset('template/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(function () {
        $('#hrm_list').DataTable({
            order: [[ 0, "desc" ]],
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
        })
        // $("#hrm_list_filter").prepend('<a class="btn btn-primary" href="{{route('product-category.create')}}"><i class="fa fa-plus"></i> Tạo mới</a>');
    })
    $(".del-category").on('click', function(e){
        e.preventDefault();
        id = $(this).attr('data-id');
        Swal.fire({
            title: 'Warning',
            text: "Bạn có chắc muốn xóa danh mục này?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })
        .then((result) => {
            if (result.value) {
                var url =  "{{ route("admin.ajax.destroy") }}";
                $.ajax({
                    method: 'delete',
                    url: url,
                    data: {
                        id: id,
                        model: 'product_category',
                        is_hard_destroy: 1,
                        _method: 'delete',
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (result) {
                        Swal.fire(
                            'Xóa danh mục!',
                            'Bạn đã xóa chuyên mục sản phẩm thành công.',
                            'success'
                        );
                        window.location.reload();
                    }
                })
                // $(this).parent().parent().remove();
            }
        })
    })
    function restoreItem( id, title= 'Are You Sure?') {
      var model = 'product_category';
      url = '{{ route("admin.ajax.restore") }}';
      Swal.fire({
          title: 'Are you sure?',
          text: "Bạn muốn khôi phục chuyên mục này!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý',
          cancelButtonText: 'Hủy bỏ'
      })
      .then((result) => {
        if (result.value) {
          $.ajax({
              url: url,
              type: 'POST',
              data: {
                id: id,
                model: model,
              }
          }).done(function () {
              Swal.fire(
                  'Thành công!',
                  'Bạn đã khôi phục chuyên mục thành công.',
                  'success',
              );
              window.location.reload();
          })
        }
      });
    }

    function hardDelete(){

    }
</script>
@endsection