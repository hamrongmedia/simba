@extends('admin.layout')
@section('title')
  Quản lý bài viết
@endsection
@section('css')
{{-- Datatable --}}
<link rel="stylesheet" href="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('main')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body">

      <div class="box-header with-border">
          <div class="pull-right">
              <div class="menu-right">
                      <a href="{{route('admin.page.create')}}" class="btn  btn-success  btn-flat"
                      title="New" id="button_create_new">
                      <i class="fa fa-plus" title="Add new"></i>
                  </a>
              </div>
          </div>
      </div>
      <section id="pjax-container" class="table-list">
        {{-- @include('admin.pages.ajax_components.post_table') --}}
        <table id="pages-table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên trang</th>
                    <th>Đường dẫn</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $index => $page)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$page->title}}</td>
                        <td><a target="_blank" href="{{route('page.detail', $page->slug)}}">{{ $page->slug}}</a></td>
                        <td>
                            @if ($page->status == 1)
                                <span class="label label-success">Đang hoạt động</span>
                            @else
                                <span class="label label-danger">Dừng hoạt động</span>
                            @endif
                        </td>
                        <td>
                            <a target="_blank" href="{{route('admin.page.edit', $page->id)}}">
                                <span title="Edit" type="button" class="btn btn-flat btn-primary">
                                    <i class="fa fa-edit"></i></span>
                            </a>
                            <span onclick="deleteItem({{$page->id}})" title="Delete" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>  
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
<script src="{{ asset('template/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
$(function () {
    $("#pages-table").dataTable({
    order: [[ 0, "desc" ]],
    processing: true,
    responsive:true,
    autoWidth:false,
    scrollX: true,
    });
});

    function deleteAjax(url, id){
        $.ajax({
            type:'post',
            url: url,
            data:{
                id: id,
            },
            success: function(data){
                swalToast(data.success);
            },
            error: function(error){
                swalToast('Lỗi phía server!', 'error');
            }
        })
    }


  function deleteItem(id) {
    Swal.fire({
        title: 'Xóa danh mục?',
        text: "Bạn không thể hoàn tác!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Vẫn xóa nó'
    })
    .then((result) => {
        var url = "{{route('admin.page.destroy')}}";
        if (result.value) {
            deleteAjax(url,id);
            location.reload();
        }
    })
  }

</script>
@endsection