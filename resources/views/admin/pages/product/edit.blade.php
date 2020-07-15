@extends('admin.layout')

@section('title')
Cập nhật sản phẩm
@endsection

@section('main')
<div class="row">
    <form action="{{route('admin.product.update', $data->id)}}" method="post" accept-charset="UTF-8" class="" id="form-main"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.pages.product.form')
    </form>
    <!-- end Modal -->
    <div id="add-new-product-variation-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"><i class="til_img"></i><strong>Thêm biến thể mới</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body with-padding">
                    <form action="" method="POST" id="form-add-variation">
                        {{ csrf_field() }}
                        <div class="variation-form-wrapper">
                            <div class="row">
                                @if( count($product_attribute_map) > 0 )
                                    @foreach($product_attribute_map as $pam)
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="attribute-{{ $pam->id }}" class="text-title-field required" aria-required="true">{{  $pam->name }}</label>
                                                <div class="ui-select-wrapper">
                                                    <select class="ui-select form-control" id="attribute-{{ $pam->id }}" name="attribute_sets[{{ $loop->index }}]">
                                                        @foreach($pam->attributeValues as $atv)
                                                            <option value="{{ $atv->id }}">{{ $atv->value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="variation-images" style="position: relative; border: 1px dashed #ccc; padding: 10px;">
                                <div class="product-images-wrapper">
                                    <a href="#" class="add-new-product-image js-btn-trigger-add-image" data-input="thumbnail" data-preview="holder">Chọn hình ảnh
                                    </a>
                                    <div class="images-wrapper">
                                        <input id="thumbnail" type="hidden" name="thumbnail" class="image-data">
                                        <div class="text-center">
                                            <img width="120" id="holder" class="preview_image" src="{{ asset('admin/images/placeholder.png') }}" type="text" name="filepath" alt="preview image">
                                            <br>
                                            <p style="color:#c3cfd8">Chọn nút <strong>Chọn hình ảnh</strong> để thêm ảnh.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="float-left btn btn-warning" data-dismiss="modal">Hủy bỏ</button>
                    <a class="float-right btn btn-info" id="store-product-variation-button" href="#">Lưu thay đổi</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->
    <div id="edit-product-variation-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"><i class="til_img"></i><strong>Edit variation</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body with-padding">
                    <div class="variation-form-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="attribute-color" class="text-title-field required">Color</label>
                                    <div class="ui-select-wrapper">
                                        <select class="ui-select" id="attribute-color" name="attribute_sets[1]">
                                            <option value="4">
                                                Red
                                            </option>
                                            <option value="2">
                                                Green
                                            </option>
                                            <option value="3">
                                                Blue
                                            </option>
                                            <option value="10">
                                                Black
                                            </option>
                                            <option value="11" selected="">
                                                Brown
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="variation-images" style="position: relative; border: 1px dashed #ccc; padding: 10px;">
                            <div class="product-images-wrapper">
                                <a href="#" class="add-new-product-image js-btn-trigger-add-image" data-preview="image-holder">Add image
                                </a>
                                <div class="images-wrapper">
                                    <div data-name="images[]" class="text-center cursor-pointer js-btn-trigger-add-image default-placeholder-product-image ">
                                        <img src="{{ asset('admin/images/placeholder.png') }}" alt="Image" width="120">
                                        <br>
                                        <p style="color:#c3cfd8">Using button <strong>Select image</strong> to add more images.</p>
                                    </div>
                                    <ul class="list-unstyled list-gallery-media-images clearfix hidden ui-sortable" style="padding-top: 20px;">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="float-left btn btn-warning" data-dismiss="modal">Hủy bỏ</button>
                    <a class="float-right btn btn-info" id="update-product-variation-button" href="#">Lưu thay đổi</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->
    <div id="generate-all-versions-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog    modal-xs  ">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"><i class="til_img"></i><strong>Generate all variations</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body with-padding">
                    Are you sure you want to generate all variations for this product?
                </div>

                <div class="modal-footer">
                    <button class="float-left btn btn-warning" data-dismiss="modal">Hủy bỏ</button>
                    <a class="float-right btn btn-info" id="generate-all-versions-button" href="#">Continue</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->
    <div id="confirm-delete-version-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog    modal-xs  ">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title"><i class="til_img"></i><strong>Delete variation?</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body with-padding">
                    Are you sure you want to delete this variation? This action cannot be undo.
                </div>

                <div class="modal-footer">
                    <button class="float-left btn btn-warning" data-dismiss="modal">Hủy bỏ</button>
                    <a class="float-right btn btn-danger" id="delete-version-button" href="#">Continue</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->
    
</div>
@endsection
@section('js')
@include('admin.pages.product.script')
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

        $('#select-category').val({{json_encode($data->getCategories())}}); // Select the option with a value of '1'
        $('#select-category').trigger('change');
        $(".imgAdd").click(function(){
            $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
        });
    })
</script>
@include('admin.component.ckeditor_js')
@endsection