@extends('admin.layout')
@section('title')
  Quản lý bài viết
@endsection

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body">
        <table id="hrm_list" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th></th>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
               </tr>
            </thead>
            <tbody>
                <tr>
                  <td>
                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input class="input" type="checkbox" data-id="1" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                  </td>
                  <td>1</td>
                  <td>tré</td>
                  <td><img alt="tré" title="" src="http://localhost/s-cart/public/data/content/img-27.jpg" style=" width:50px;"></td>
                  <td>0</td>
                  <td><span class="label label-danger">OFF</span></td>
                  <td>
                    <a href="http://localhost/s-cart/public/sc_admin/news/edit/1"><span title="Sửa" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>&nbsp;

                    <span onclick="deleteItem(1);" title="Xóa" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input class="input" type="checkbox" data-id="1" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                  </td>
                  <td>1</td>
                  <td>tré</td>
                  <td><img alt="tré" title="" src="http://localhost/s-cart/public/data/content/img-27.jpg" style=" width:50px;"></td>
                  <td>0</td>
                  <td><span class="label label-danger">OFF</span></td>
                  <td>
                    <a href="http://localhost/s-cart/public/sc_admin/news/edit/1"><span title="Sửa" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>&nbsp;

                    <span onclick="deleteItem(1);" title="Xóa" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input class="input" type="checkbox" data-id="1" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                  </td>
                  <td>1</td>
                  <td>tré</td>
                  <td><img alt="tré" title="" src="http://localhost/s-cart/public/data/content/img-27.jpg" style=" width:50px;"></td>
                  <td>0</td>
                  <td><span class="label label-danger">OFF</span></td>
                  <td>
                    <a href="http://localhost/s-cart/public/sc_admin/news/edit/1"><span title="Sửa" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>&nbsp;

                    <span onclick="deleteItem(1);" title="Xóa" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span>
                  </td>
                </tr>
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
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection