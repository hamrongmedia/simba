@extends('admin.layout')
@section('title')
  Quản lý bài viết
@endsection

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body">
        <table id="hrm_list" class="table table-bordered table-striped">
          
            <thead>
              <tr>
                    <th class="no-sort check-all-table text-left"><input type="checkbox" id="master"></th>
                    <th>ID</th>
                    <th>Tên bài viết</th>
                    <th>Đường dẫn</th>
                    <th>Ảnh</th>
                    <th>Chuyên mục</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
               </tr>
            </thead>
            <tbody>
              @foreach($data as $obj)
                <tr id="post-{{$obj->id}}">
                  <td class="text-left"><input type="checkbox" class="sub_chk" data-id="{{$obj->id}}"></td>
                  <td>{{$obj->id}}</td>
                  <td><a href="{{route('post.detail', $obj->slug)}}" target="_blank">{{$obj->title}}</a></td>
                  <td>{{$obj->slug}}</td>
                  <td><img src="{{$obj->image}}" style="max-width: 200px;"></td>
                  <td>{{-- {{ $obj->Category->name }} --}}</td>
                  <td>
                    @if ($obj->status == 1)
                      <span class="label label-success">Đang sử dụng</span></a>
                      @else
                      <span class="label label-danger">Ngừng sử dụng</span></a>
                    @endif
                  </td>
                  <td>
                    <a href="{{route('admin.post.edit', ['id'=>$obj->id])}}"><span title="Sửa" type="button" class="btn btn-flat btn-primary">
                      <i class="fa fa-edit"></i></span></a>&nbsp;
                    <a  class="btn btn-flat btn-danger" onclick="deleteItem({{$obj->id}});" type="button">
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
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    });

    $("#hrm_list_filter").prepend('<a class="btn btn-primary" href="{{route('admin.post.create')}}"><i class="fa fa-plus"></i> Tạo mới</a>');
  });
  function deleteAjax(id) {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
      })
      $.ajax({
          url: "{{route('admin.post.destroy')}}",
          type: 'post',
          data: {
              id: id
          }
      }).done(function(){
          Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
          );
          $('#post-'+ id).remove();
      }).fail(function(result){
          Swal.fire(
                'Failed!',
                'Bạn không có quyền xóa bài viết.',
                'error'
            );
      });
  }      

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
            if (result.value) {
                deleteAjax(id);
            }
        });
    }
</script>
@endsection