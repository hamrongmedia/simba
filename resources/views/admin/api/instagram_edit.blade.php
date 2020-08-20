@extends('admin.layout')
@section('main')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Instagram API
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Sửa sản phẩm</div>
        <div class="panel-body">
        <form action="{{ url('/hrm/api/instagram/update') }}" method="post">
            <input type="hidden" id="_token" name="_token" value="{!! csrf_token() !!}" />
                <input type="hidden" id="id" name="id" value="{!! $getSanphamById[0]->id !!}" />
                <div class="row" style="margin-bottom:40px">
                    <div class="col-xs-8">
                        <div class="form-group" >
                            <label>Tên id_user</label>
                            <input required type="text" name="id_user" class="form-control" value="{{ $getSanphamById[0]->id_user }}">
                        </div>
                        <div class="form-group" >
                            <label>Mã Token</label>
                            <input required type="text" name="token" class="form-control" value="{{ $getSanphamById[0]->token }}">
                        </div>
                        <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                        <a href="#" class="btn btn-danger">Hủy bỏ</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
      
  </div>
</div>
@endsection