@extends('admin.layout')

@section('title')
Tạo sản phẩm
@endsection

@section('main')
<div class="row">
    <form action="{{route('admin.product.store')}}" method="post" accept-charset="UTF-8" class="" id="form-main"
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
                        <label class="control-label">Tên sản phẩm(*)</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Nhập slug">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mô tả</label>
                        <textarea class="form-control editor" name="description" rows="3"
                                placeholder="Nhập mô tả ngắn" id="editor"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Giá</label>
                                <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Giá khuyến mãi</label>
                                <input type="text" name="promotion_price" class="form-control" placeholder="Nhập giá khuyến mãi sản phẩm">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Số lượng</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng">
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sản phẩm đa thuộc tính</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="list-product-attribute-values-wrap hidden">
                        <div class="product-select-attribute-item-template">
                            <div class="product-attribute-set-item">
                                <div class="row">
                                    <div class="col-md-5 col-sm-6">
                                        <div class="form-group">
                                            <label class="text-title-field">Tên thuộc tính</label>
                                            <select class="form-control next-input product-select-attribute-item">
                                                @if( count($attributes) > 0 )
                                                    @foreach($attributes as $attribute)
                                                        <option value="{{ $attribute->id }}">
                                                            {{ $attribute->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-6">
                                        <div class="form-group">
                                            <label class="text-title-field">Giá trị</label>
                                            <div class="product-select-attribute-item-value-wrap">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-6 product-set-item-delete-action hidden">
                                        <div class="form-group">
                                            <label class="text-title-field">&nbsp;</label>
                                            <div style="height: 36px;line-height: 33px;vertical-align: middle">
                                                <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @if( count($attributes) > 0 )
                            @foreach($attributes as $attribute)
                                <div class="product-select-attribute-item-wrap-template product-select-attribute-item-value-wrap-{{ $attribute->id }}">
                                    <select class="form-control next-input product-select-attribute-item-value product-select-attribute-item-value-id-{{ $attribute->id }}" data-set-id="{{ $attribute->id }}">
                                        @foreach($attribute->attributeValues as $atv)
                                            <option value="{{ $atv->id }}">{{ $atv->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="list-product-attribute-wrap">
                        <div class="list-product-attribute-wrap-detail">
                            @if( count($attributes) > 0 )
                                @foreach($attributes as $attribute)
                                    @if($loop->first)
                                        <div class="product-attribute-set-item">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-title-field">Tên thuộc tính</label>
                                                        <select class="form-control next-input product-select-attribute-item" aria-invalid="false">
                                                            <option value="2">
                                                                Size
                                                            </option>
                                                            <option value="1">
                                                                Color
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-title-field">Giá trị thuộc tính</label>
                                                        <div class="product-select-attribute-item-value-wrap">
                                                            <select class="form-control next-input product-select-attribute-item-value product-select-attribute-item-value-id-2" name="added_attributes[2]" data-set-id="2">
                                                                <option value="5">
                                                                    S
                                                                </option>
                                                                <option value="6">
                                                                    M
                                                                </option>
                                                                <option value="7">
                                                                    L
                                                                </option>
                                                                <option value="8">
                                                                    XL
                                                                </option>
                                                                <option value="9">
                                                                    XXL
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-6 product-set-item-delete-action">
                                                    <div class="form-group">
                                                        <label class="text-title-field">&nbsp;</label>
                                                        <div style="height: 36px;line-height: 33px;vertical-align: middle">
                                                            <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <a href="#" class="btn btn-secondary btn-trigger-add-attribute-item">Thêm thuộc tính</a>
                    </div>
                </div>            
            </div>
            <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tối ưu hoá bộ máy tìm kiếm (SEO)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
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
                            <option value="0" disabled selected>Chọn loại sản phẩm</option>
                            @foreach($types as $type)
                            <option value="{{$type->id}}" {{old('type') == $type->id ? "selected" : ""}}>{{$type->name}}
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
            console.log($(this).val());
        });
        // Logic product
        $(document).on("change", ".product-select-attribute-item", (function() {
            var e = [];
            $.each($(".product-select-attribute-item"), (function(t, a) {
                "" !== $(a).val() && e.push(t)
            })), e.length ? $(".btn-trigger-add-attribute-to-simple-product").removeClass("hidden") : $(".btn-trigger-add-attribute-to-simple-product").addClass("hidden")
        }));
        $(document).on("change", ".product-select-attribute-item", (function(t) {
            $(t.currentTarget).closest(".product-attribute-set-item").find(".product-select-attribute-item-value-wrap").html($(".list-product-attribute-values-wrap .product-select-attribute-item-value-wrap-" + $(t.currentTarget).val()).html()), $(t.currentTarget).closest(".product-attribute-set-item").find(".product-select-attribute-item-value-id-" + $(t.currentTarget).val()).prop("name", "added_attributes[" + $(t.currentTarget).val() + "]"), e()
        }));
        $(document).on("click", ".btn-trigger-add-attribute-item", (function(t) {
            t.preventDefault();
            var a = $(".list-product-attribute-values-wrap .product-select-attribute-item-template"),
                r = null;
            $.each($(".product-attribute-set-item:visible .product-select-attribute-item option"), (function(e, t) {
                $(t).prop("value") !== $(t).closest("select").val() && !1 === $(t).prop("disabled") && (a.find(".product-select-attribute-item-value-wrap").html($(".list-product-attribute-values-wrap .product-select-attribute-item-value-wrap-" + $(t).prop("value")).html()), 
                r = $(t).prop("value"))
            }));
            var n = $(".list-product-attribute-wrap-detail");
            n.append(a.html()), 
            n.find(".product-attribute-set-item:last-child .product-select-attribute-item").val(r), 
            n.find(".product-select-attribute-item-value-id-" + r).prop("name", "added_attributes[" + r + "]"), 
            n.find(".product-attribute-set-item").length === $(".list-product-attribute-values-wrap .product-select-attribute-item-wrap-template").length 
                && $(t.currentTarget).addClass("hidden"), 
                $(".product-set-item-delete-action").removeClass("hidden")
        }))
    })
</script>
@include('admin.component.ckeditor_js')
@endsection