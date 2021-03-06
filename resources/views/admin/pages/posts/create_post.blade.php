@extends('admin.layout')

@section('title')
  Tạo bài viết
@endsection

@section('main')
<div class="row">
    <form action="{{route('admin.post.store')}}" method="post" accept-charset="UTF-8" class="" id="form-main" enctype="multipart/form-data">
    @csrf <!-- {{ csrf_field() }} -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tạo mới một Blog/News</h3>
                </div>
             <!-- form start -->
                <div class="box-body">   
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Nhập mô tả ngắn"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                <input type="checkbox">
                                Nổi bật?
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="editor" class="editor" name="content" rows="10" cols="80">
                            </textarea>
                        </div>
                </div>
            </div>
            <div class="box box-primary">
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
                        <label>Tiêu đề</label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Nhập tiêu đề">
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea class="form-control" name="meta_des" rows="3" placeholder="Nhập mô tả ngắn"></textarea>
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
                            <option value="2">Bản nháp</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="reset" class="btn btn-default">Hủy</button>
                    <button  class="btn btn-info pull-right" name="save">Đăng</button>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Chuyên Mục</h3>
                </div>
                <div class="box-body">
                    
                    @if(!isset($obj))
                    <div class="form-group" style="max-height: 150px; overflow:auto">
                        @foreach($cats as $p)
                            <div class="checkbox">
                                <label>
                                <input name="cat_id[]" type="checkbox" value="{{$p->id}}" {{old('cat_id') == $p->id ? "checked" : ""}}>
                                {{$p->name}}
                                </label>
                            </div>
                        @endforeach
                    </div> 
                    @else
                    <div multiple="true" class="form-control overflow-auto" style="height: 200px">
                        @foreach($cats as $p)
                            <div class="checkbox">
                                <label>
                                    <input name="cat_id[]" type="checkbox" value="{{$p->id}}" {{$obj->cat_id == $p->id ? "checked" : ""}}>
                                    {{$p->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div> 
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Hình ảnh</h3>
                </div>
                <div class="box-body">
                    <div class="image-box">
                        <input type="hidden" name="image" value="" class="image-data">
                        <div class="preview-image-wrapper ">
                            <img src="https://cms.botble.com/vendor/core/images/placeholder.png" alt="preview image" class="preview_image" width="150">
                            <a class="btn_remove_image" title="Remove image">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                        <div class="image-box-actions">
                            <a href="#" class="btn_gallery" data-result="image" data-action="select-image">
                                Choose image
                            </a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </form>
</div>

@endsection

@section('js')
    @include('admin.component.ckeditor_js')
@endsection