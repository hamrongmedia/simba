@extends('admin.layout')

@section('title')
Chỉnh sửa danh mục sản phẩm
@endsection

@section('main')
<div class="row">
    <form action="{{route('product-category.update', $category->id)}}" method="post" accept-charset="UTF-8" class="" id="form-main"
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
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên chuyên mục" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Nhập slug" value="{{$category->slug}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Danh mục cha</label>
                        <select class="form-control m-b" name="parent_category" id="cat_id">
                            <option value="" disabled selected>Chọn danh mục</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('parent_category') == $category->id || (isset($category->parent_category) && $category->parent_category == $category->id) ? "selected" : ""}}>{{$category->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mô tả</label>
                        <textarea class="form-control" name="description" rows="3"
                                placeholder="Nhập mô tả ngắn">{{$category->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta title(Tiêu đề SEO)</label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Nhập tên chuyên mục" value="{{$category->meta_title}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta key word</label>
                        <input type="text" name="meta_keyword" class="form-control" placeholder="Nhập keyword chuyên mục" value="{{$category->meta_keyword}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta description</label>
                        <textarea class="form-control" name="meta_description" rows="3"
                            placeholder="Nhập mô tả ngắn">{{$category->meta_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="assign-switch">
                            <label class="switch-label">
                                @if($category->status)
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