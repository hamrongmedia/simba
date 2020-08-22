@extends('admin.layout')
@section('main')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thay đổi thông tin khách hàng
    </div>
    <div class="panel panel-primary">
        <div class="panel-body">
        <form action="{{ url('/hrm/contact/email/update') }}" method="post">
            <input type="hidden" id="_token" name="_token" value="{!! csrf_token() !!}" />
                <input type="hidden" id="id" name="id" value="{!! $getEmailById[0]->id !!}" />
                <div class="row" style="margin-bottom:40px">
                    <div class="col-xs-8">
                        <div class="form-group" >
                            <label>Email contact</label>
                            <input required type="text" name="email" class="form-control" value="{{ $getEmailById[0]->email }}">
                        </div>
                        <input type="submit" name="submit" value="Thay đổi" class="btn btn-primary">
                        <a href="#" class="btn btn-danger">Hủy bỏ</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
      
  </div>
</div>
@endsection