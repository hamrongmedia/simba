@extends('admin.layout')

@section('title')
Cập nhật sản phẩm
@endsection

@section('main')
<div class="row">
    <form action="{{route('admin.product.update', $product->id)}}" method="post" accept-charset="UTF-8" class="" id="form-main"
        enctype="multipart/form-data">
        {{ method_field('PUT') }}
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
                        <label class="control-label">Tên sản phẩm(*)</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Nhập slug" value="{{$product->slug}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mô tả</label>
                        <textarea class="form-control editor" name="description" rows="3"
                                placeholder="Nhập mô tả ngắn" id="editor">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Giá</label>
                                <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm" value="{{$product->price}}">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Giá khuyến mãi</label>
                                <input type="text" name="promotion_price" class="form-control" placeholder="Nhập giá khuyến mãi sản phẩm" {{$product->promotion_price}}>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Thuộc tính</label>
                            </div>
                            <div class="form-group--attribute col-md-12">
                                @foreach(json_decode($product->attribute) as $key => $value)
                                <div class="row form-group--attribute--row">
                                    <div class="col-md-5">
                                        <select class="form-control select_attribute" name="attribute[]">
                                            <option value="" disabled selected>Chọn thuộc tính cho sản phẩm</option>
                                            @foreach($attributes as $attr)
                                                @if($key == $type->id)
                                                <option value="{{$attr->id}}" selected>{{$attr->name}}</option>
                                                @else
                                                <option value="{{$attr->id}}">{{$attr->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control select_value" name="value[]" data="{{$value}}">
                                            <option value="" disabled selected>Chọn giá trị cho thuộc tính</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary add-attribute"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-danger remove-attribute"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Số lượng</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng" value="{{$product->quantity}}">
                    </div>
                    <div class="form-group">
                        <div class="assign-switch">
                            <label class="switch-label">
                                <input type="checkbox" class="switch-assign" name="status" {{!$product->status ? 'checked' : ''}}>
                                <span class="slider round"></span>
                            </label>
                            <label class="d-inline-block">Bật tắt</label>
                        </div>
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
                        <label for="meta_title">Tiêu đề (Tiêu đề SEO)</label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Nhập tiêu đề" value="{{$product->meta_title}}">
                    </div>
                    <div class="form-group">
                        <label for="meta_des">Mô Tả</label>
                        <textarea class="form-control" name="meta_description" rows="3" placeholder="Nhập mô tả ngắn">{{$product->meta_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta Keyword</label>
                        <input type="text" name="meta_keyword" class="form-control" placeholder="Nhập từ khóa" value="{{$product->meta_keyword}}">
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
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label">Danh mục</label>
                        <select class="form-control input-sm permission select2 select2-hidden-accessible"
                            multiple="" data-placeholder="Chọn danh mục" style="width: 100%;"
                            name="categories[]" tabindex="-1" aria-hidden="true" id="select-category">
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
                            <option value="{{$type->id}}" {{old('type') == $type->id || $product->type_id == $type->id ? "selected" : ""}}>{{$type->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Hình ảnh</h3>
                </div>
                <div class="box-body">
                    <div class="image-box">
                        @include('admin.component.image_button', ['name' => 'images', 'id' => 'thumb-btn', 'value' => '', 'holder' => 'image-holder', 'hidden' => true, 'height' => '300px'])

                    </div>
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

        $('.form-group--attribute').on('change', ".select_attribute", function(){
            if($(this).val()!=''){
                el = $(this);
                $.ajax({
                    url: "{{route('ajaxGetValue')}}",
                    method: "GET",
                    data: {
                        id: $(this).val(),
                    },
                    success: function(result){
                        values = result.data;
                        html = '<option value="" disabled selected>Chọn giá trị cho thuộc tính</option>';
                        $.each(values, function(index, value){
                            html += "<option value='"+value.id+"'>"+value.value+"</option>"
                        });
                        el.parent().parent().find('.select_value').html(html);
                    }
                })
            }
        })

        $.each($('.form-group--attribute').find('.select_attribute'), function(){
            el = $(this);
            $.ajax({
                url: "{{route('ajaxGetValue')}}",
                method: "GET",
                data: {
                    id: $(this).val(),
                },
                success: function(result){
                    values = result.data;
                    attr_val = el.parent().parent().find('.select_value').attr('data');
                    html = '<option value="" disabled>Chọn giá trị cho thuộc tính</option>';
                    $.each(values, function(index, value){
                        if(attr_val == value.id)
                            html += "<option value='"+value.id+"' selected>"+value.value+"</option>"
                        else html += "<option value='"+value.id+"'>"+value.value+"</option>"
                    });
                    el.parent().parent().find('.select_value').html(html);
                }
            })
        });

        $('#select-category').val({{json_encode($product->getCategories())}}); // Select the option with a value of '1'
        $('#select-category').trigger('change');
        $(".imgAdd").click(function(){
            $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
        });
    })
</script>
@include('admin.component.ckeditor_js')
@endsection