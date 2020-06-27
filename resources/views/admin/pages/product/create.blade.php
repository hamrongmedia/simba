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
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm">
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
                                <option value="{{$category->id}}">{{$category->name}}
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
                        <textarea class="form-control editor" name="description" rows="3"
                                placeholder="Nhập mô tả ngắn" id="editor"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Giá</label>
                        <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Giá khuyễn mãi</label>
                        <input type="text" name="promotion_price" class="form-control" placeholder="Nhập giá khuyến mãi sản phẩm">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Thuộc tính</label>
                            </div>
                            <div class="form-group--attribute col-md-12">
                                <div class="row form-group--attribute--row">
                                    <div class="col-md-5">
                                        <select class="form-control select_attribute" name="attribute[]">
                                            <option value="" disabled selected>Chọn thuộc tính cho sản phẩm</option>
                                            @foreach($types as $key => $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <select class="form-control select_value" name="value[]">
                                            <option value="" disabled selected>Chọn giá trị cho thuộc tính</option>
                                        </select>
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
                        <input type="file" name="images[]" placeholder="Chọn hình ảnh" multiple>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Số lượng</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng">
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
            console.log($(this).val());
        })
    })
</script>
@include('admin.component.ckeditor_js')
@endsection