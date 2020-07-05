@extends('admin.layout')

@section('title')
Tạo danh mục sản phẩm
@endsection

@section('main')
<div class="row">
    <form action="{{route('product-category.store')}}" method="post" accept-charset="UTF-8" class="" id="form-main"
        enctype="multipart/form-data">
        @csrf
        <!-- {{ csrf_field() }} -->
        <div class="col-md-9">
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
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên chuyên mục">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Nhập slug">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Danh mục cha</label>
                        <select class="form-control m-b" name="parent_category" id="cat_id">
                            <option value="" disabled selected>Chọn danh mục</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('parent_category') == $category->id ? "selected" : ""}}>{{$category->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mô tả</label>
                        <textarea class="form-control" name="description" rows="3"
                                placeholder="Nhập mô tả ngắn"></textarea>
                    </div>
                </div>
            </div>
            <div class="box box-primary collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tối ưu hoá bộ máy tìm kiếm (SEO)</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    
                    <div class="box-body">
                        <p>Thiết lập các thẻ mô tả giúp người dùng dễ dàng tìm thấy trên công cụ tìm kiếm như Google.</p>
                        <div class="form-group">
                            <label for="meta_title">Tiêu đề (Tiêu đề SEO)</label>
                            <input type="text" name="meta_title" class="form-control" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form-group">
                            <label for="meta_des">Mô Tả</label>
                            <textarea class="form-control" name="meta_description" rows="3" placeholder="Nhập mô tả ngắn"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Meta Keyword</label>
                            <input type="text" name="meta_keyword" class="form-control" placeholder="Nhập từ khóa">
                        </div>
                    </div>
                </div> 
            </div>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Đăng</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control" name="status">
                            <option value="1">Đã đăng</option>
                            <option value="0">Bản nháp</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="reset" class="btn btn-default">Hủy</button>
                    <button  class="btn btn-info pull-right" name="save">Đăng</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection