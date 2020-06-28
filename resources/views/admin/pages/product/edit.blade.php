@extends('admin.layout')

@section('title')
Cập nhật sản phẩm
@endsection

@section('main')
<div class="row">
    <form action="{{route('product.update', $product->id)}}" method="post" accept-charset="UTF-8" class="" id="form-main"
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
                        <label class="control-label">Tên sản phẩm(*)</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên chuyên mục" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Nhập slug" value="{{$product->slug}}">
                    </div>
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
                    <div class="form-group">
                        <label class="control-label">Mô tả</label>
                        <textarea class="form-control editor" name="description" rows="3"
                                placeholder="Nhập mô tả ngắn" id="editor">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Giá</label>
                        <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm" value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Giá khuyễn mãi</label>
                        <input type="text" name="promotion_price" class="form-control" placeholder="Nhập giá khuyến mãi sản phẩm" value="{{$product->promotion_price}}">
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
                                            @foreach($types as $type)
                                                @if($key == $type->id)
                                                <option value="{{$type->id}}" selected>{{$type->name}}</option>
                                                @else
                                                <option value="{{$type->id}}">{{$type->name}}</option>
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
                        <label class="control-label">Hình ảnh</label>
                        <input type="file" name="images[]" placeholder="Chọn hình ảnh" multiple>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 imgUp">
                                <div class="imagePreview"></div>
                                <label class="btn btn-primary">Upload
                                    <input type="file" class="uploadFile img" value="Upload Photo" style="height: 0px;overflow: hidden;">
                                </label>
                            </div><!-- col-2 -->
                            <i class="fa fa-plus imgAdd"></i>
                        </div><!-- row -->
                    </div>
                    <div class="form-group">
                        <label class="control-label">Số lượng</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng" value="{{$product->quantity}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta title(Tiêu đề SEO)</label>
                        <input type="text" name="meta_title" class="form-control" placeholder="Nhập tên chuyên mục" value="{{$product->meta_title}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta key word</label>
                        <input type="text" name="meta_keyword" class="form-control" placeholder="Nhập tên chuyên mục" value="{{$product->meta_keyword}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta description</label>
                        <textarea class="form-control" name="meta_description" rows="3"
                            placeholder="Nhập mô tả ngắn">{{$product->meta_description}}</textarea>
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
                        console.log(attr_val == value.id);
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
        $(document).on("click", "i.del" , function() {
            $(this).parent().remove();
        });
        $(function() {
            $(document).on("change",".uploadFile", function()
            {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
        
                    reader.onloadend = function(){ // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                    }
                }
            
            });
        });
    })
</script>
@include('admin.component.ckeditor_js')
@endsection
<style>
.imagePreview {
    width: 100%;
    height: 180px;
    background-position: center center;
    background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
    background-color:#fff;
    background-size: cover;
    background-repeat:no-repeat;
    display: inline-block;
    border: 1px solid rgba(0,0,0,0.2);
}
.btn-primary
{
    display:block;
    border-radius:0px;
    box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
    margin-top:-5px;
}
.imgUp
{
    margin-bottom:15px;
}
.del
{
    position:absolute;
    top:0px;
    right:15px;
    width:30px;
    height:30px;
    text-align:center;
    line-height:30px;
    background-color:rgba(255,255,255,0.6);
    cursor:pointer;
}
.imgAdd
{
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #4bd7ef;
    color: #fff;
    box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.2);
    text-align: center;
    line-height: 30px;
    margin-top: 0px;
    cursor: pointer;
    font-size: 15px;
    padding-top: 7px;
}
</style>