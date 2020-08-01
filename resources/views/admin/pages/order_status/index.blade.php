@extends('admin.layout')
@section('title','Quản lý trạng thái đơn hàng')
@section('main')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body">
        <div class="box-header with-border">
          <div class="pull-left">
          </div>
          <!-- /.box-tools -->
      </div>
      <div class="box-header with-border">
          <div class="pull-right">
              <div class="menu-right">
                      <a href="{{route('admin.order_status.create')}}" class="btn  btn-success  btn-flat"
                      title="New" id="button_create_new">
                      <i class="fa fa-plus" title="Add new"></i>
                  </a>
              </div>
          </div>
      </div>
        <section id="pjax-container" class="table-list">
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($datas) >0)
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.order_status.edit',['id'=>$data->id]) }}">
                                            <span title="Edit" type="button" class="btn btn-flat btn-primary">
                                                <i class="fa fa-edit"></i></span>
                                        </a>&nbsp;
                                        <span onclick="deleteItem({{$data->id}});" title="Delete" class="btn btn-flat btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <div class="col-md-5">
                    Hiển thị <b>{{ $datas->currentPage() }}</b> từ <b>{{ $datas->count() }}</b> trong <b>{{ $datas->total() }}</b> bản ghi
                </div>
                <div class="col-md-7">
                    {{ $datas->links() }}
                </div>
            </div>
        </section>
        </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
@endsection
@section('js')
<script>
    function deleteItem(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })
        .then((result) => {
            url_delete = '{{ route('admin.order_status.destroy') }}';
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url_delete,
                data: {
                    id : id,
                    _method : 'delete',
                },
                dataType: 'json',
                success: function (data){
                    Swal.fire( 'Thành công!','Bạn đã xóa biến thể thành công','success' );
                    $("#product-variations-wrapper").html(data.data);
                },
                error: function (data) {
                    Swal.fire( 'Thất bại!','Không thể xóa biến thể','error' );
                }
            });
        })
    }
</script>
@endsection