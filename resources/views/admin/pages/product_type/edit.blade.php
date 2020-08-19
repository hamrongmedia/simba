@extends('admin.layout')

@section('title')
Chỉnh sửa loại sản phẩm
@endsection

@section('main')
<div class="row">
    <form action="{{route('product-type.update', $type->id)}}" method="post" accept-charset="UTF-8" class="" id="form-main"
        enctype="multipart/form-data">
        {{ method_field('PUT') }}
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
                        <label class="control-label">Tên danh mục(*)</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên chuyên mục" value="{{$type->name}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Nhập slug" value="{{$type->slug}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mô tả</label>
                        <textarea class="form-control" name="description" rows="3"
                                placeholder="Nhập mô tả ngắn">{{$type->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta title(Tiêu đề SEO)</label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Nhập tên chuyên mục" value="{{$type->meta_title}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta key word</label>
                        <input type="text" name="meta_keyword" class="form-control" placeholder="Nhập keyword chuyên mục" value="{{$type->meta_keyword}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta description</label>
                        <textarea class="form-control" name="meta_description" rows="3"
                            placeholder="Nhập mô tả ngắn">{{$type->meta_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="assign-switch">
                            <label class="switch-label">
                                @if($type->status)
                                <input type="checkbox" class="switch-assign" name="status" checked>
                                @else
                                <input type="checkbox" class="switch-assign" name="status">
                                @endif
                                <span class="slider round"></span>
                            </label>
                            <label class="d-inline-block">Bật tắt</label>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection