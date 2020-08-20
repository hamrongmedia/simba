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
                            <th>Trạng thái</th>
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
                                        {!! \App\Helpers\Common::deleteFlag($data->is_deleted) !!}
                                    </td>
                                    <td>
                                        {!! \App\Helpers\Common::showDataAction($data,route('admin.order_status.edit',['id'=>$data->id])) !!}
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
    function deleteItem( id) {
        Swal.fire({
            title: 'Warning',
            text: "Bạn có chắc muốn xóa trạng thái đơn hàng này?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Vâng, xóa trạng thái!'
        })
        .then((result) => {
            if (result.value) {
                var url =  "{{ route("admin.ajax.destroy") }}";
                $.ajax({
                    method: 'delete',
                    url: url,
                    data: {
                        id: id,
                        model: 'order_status',
                        _method: 'delete',
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (result) {
                        Swal.fire(
                            'Xóa trạng thái đơn hàng!',
                            'Bạn đã xóa trạng thái đơn hàng thành công.',
                            'success'
                        );
                        window.location.reload();
                    }
                })
            }
        })
    }
    function restoreItem( id, title= 'Are You Sure?') {
      url = '{{ route("admin.ajax.restore") }}';
      Swal.fire({
          title: 'Bạn có chắc chắn không?',
          text: "Bạn muốn khôi phục trạng thái đơn hàng này!",
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
                model: "order_status",
              }
          }).done(function () {
              Swal.fire(
                  'Thành công!',
                  'Bạn đã khôi phục trạng thái đơn hàng thành công.',
                  'success',
              );
              window.location.reload();
          })
        }
      });
    }
    $('.deleteDialog').click(function(){
        var id = $(this).data('id');
        deleteItem(id);
    });
    $('.restoreDialog').click(function(){
        var id = $(this).data('id');
        restoreItem(id);
    });
</script>
@endsection