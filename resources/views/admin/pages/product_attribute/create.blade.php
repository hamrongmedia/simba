@extends('admin.layout')

@section('title')
Tạo thuộc tính sản phẩm
@endsection

@section('main')
<div class="row">
    <form action="{{route('product-attribute.store')}}" method="post" accept-charset="UTF-8" class="" id="form-main"
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
                        <label class="control-label">Tên thuộc tính(*)</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên loại sản phẩm">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mô tả</label>
                        <textarea class="form-control" name="description" rows="3"
                                placeholder="Nhập mô tả ngắn"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="assign-switch">
                            <label class="switch-label">
                                <input type="checkbox" class="switch-assign" name="status">
                                <span class="slider round"></span>
                            </label>
                            <label class="d-inline-block">Bật tắt</label>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button type="submit" name="save" value="add_new" class="btn btn-primary">Lưu và thêm tiếp</button>
                    <button type="submit" name="save" value="" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection