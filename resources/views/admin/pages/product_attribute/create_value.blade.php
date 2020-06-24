@extends('admin.layout')

@section('title')
Tạo thuộc tính giá trị: {{$attr->name}}
@endsection

@section('main')
<div class="row">
    <form action="{{route('createAttributeValue', $attr->id)}}" method="post" accept-charset="UTF-8" class="" id="form-main"
        enctype="multipart/form-data">
        @csrf
        <!-- {{ csrf_field() }} -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        @if (\Session::has('error'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{!! \Session::get('error') !!}</li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tên thuộc tính</label>
                        <input type="text" name="name" class="form-control" readonly disabled placeholder="Nhập tên loại sản phẩm" value="{{$attr->name}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Giá trị (Ngăn cách bởi dấu phẩy)</label>
                        <textarea class="form-control" name="value" rows="3"
                            placeholder="Danh sách các giá trị"></textarea>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button type="submit" name="save" value="" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection