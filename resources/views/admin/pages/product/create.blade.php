@extends('admin.layout')

@section('title')
Tạo sản phẩm
@endsection

@section('main')
<div class="row">
    <form action="{{route('product.store')}}" method="post" accept-charset="UTF-8" class="" id="form-main"
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
                        <label class="control-label">Tên sản phẩm(*)</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên chuyên mục">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Nhập slug">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Danh mục</label>
                        <select class="form-control input-sm permission select2 select2-hidden-accessible"
                            multiple="" data-placeholder="Chọn danh mục" style="width: 100%;"
                            name="categories[]" tabindex="-1" aria-hidden="true">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{old('parent_category') == $category->id ? "selected" : ""}}>{{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Loại sản phẩm</label>
                        <select class="form-control m-b" name="type" id="cat_id">
                            <option value="" disabled selected>Chọn loại sản phẩm</option>
                            @foreach($types as $type)
                            <option value="{{$type->id}}" {{old('type') == $type->id ? "selected" : ""}}>{{$type->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mô tả</label>
                        <textarea class="form-control" name="description" rows="3"
                                placeholder="Nhập mô tả ngắn"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Giá</label>
                        <input type="text" name="price" class="form-control" placeholder="Nhập tên giá sản phẩm">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Thuộc tính</label>
                            </div>
                            <div class="form-group--attribute col-md-12">
                                <div class="row form-group--attribute--row">
                                    <div class="col-md-5">
                                        <input type="text" name="price" class="form-control" placeholder="Nhập tên giá sản phẩm">
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="price" class="form-control" placeholder="Nhập tên giá sản phẩm">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary add-attribute"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-danger remove-attribute"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Hình ảnh</label>
                        <input type="text" name="image" class="form-control" placeholder="Chọn hình ảnh">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Số lượng</label>
                        <input type="text" name="quantity" class="form-control" placeholder="Chọn hình ảnh">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta title(Tiêu đề SEO)</label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Nhập tên chuyên mục">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta key word</label>
                        <input type="text" name="meta_keyword" class="form-control" placeholder="Nhập tên chuyên mục">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta description</label>
                        <textarea class="form-control" name="meta_description" rows="3"
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
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('js')
<!-- DataTables -->
<script>
    $(document).ready(function(){
        form_attr = $('.box-body').find('.form-group--attribute');
        if(form_attr.children().length == 1){
            $('.remove-attribute').css('display', 'none');
        }
        $('.form-group--attribute').on('click', '.add-attribute', function(){
            form = $(this).parent().parent();
            html = form[0].outerHTML;
            form.parent().append(html);
            $('.remove-attribute').css('display', 'inline-block');
        })
        $('.form-group--attribute').on('click', '.remove-attribute', function(){
            form = $(this).parent().parent();
            html = form[0].outerHTML;
            form.remove();
            if(form_attr.children().length == 1){
                $('.remove-attribute').css('display', 'none');
            }
        })
    })
</script>
@endsection