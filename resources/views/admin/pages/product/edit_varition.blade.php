<!DOCTYPE html>
<html>
@include('admin.partials.header')
@yield('css')
<body class="hold-transition skin-blue sidebar-mini">
<div class="main-content-edit-varition">
    <form action="{{ route('admin.product.info.edit',['id'=>$product_info_id]) }}" method="POST" id="form-edit-varition">
        {{ csrf_field() }}
        <div class="content-header clearfix">
            <h1 class="pull-left">Chỉnh sửa biến thể</h1>
            <div class="pull-right">
                <button type="submit" name="save" class="btn bg-blue" onclick="closeSelf();">
                    <i class="fa fa-floppy-o"></i> Cập nhật
                </button>
            </div>
        </div>
        <div class="variation-form-wrapper">
            <div class="row">
                @if( count($product_attribute_map) > 0 )
                    @foreach($product_attribute_map as $pam)
                        @if($loop->first)
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="attribute-{{ $pam->id }}" class="text-title-field required" aria-required="true">{{  $pam->name }}</label>
                                    <div class="ui-select-wrapper">
                                        <select class="ui-select form-control" id="attribute-{{ $pam->id }}" name="attribute_sets[{{ $loop->index }}]">
                                            @foreach($pam->attributeValues as $atv)
                                                <option value="{{ $atv->id }}" @if($data->attribute_value1 == $atv->id ) selected @endif>{{ $atv->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @elseif( $loop->count == 2 )
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="attribute-{{ $pam->id }}" class="text-title-field required" aria-required="true">{{  $pam->name }}</label>
                                    <div class="ui-select-wrapper">
                                        <select class="ui-select form-control" id="attribute-{{ $pam->id }}" name="attribute_sets[{{ $loop->index }}]">
                                            @foreach($pam->attributeValues as $atv)
                                                <option value="{{ $atv->id }}" @if($data->attribute_value2 == $atv->id ) selected @endif>{{ $atv->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="attribute-icon" class="text-title-field required" aria-required="true">
                    Icon đại diện
                </label>
                <div class="variation-images clearfix">
                    <div class="product-images-wrapper">
                        <a href="#" class="add-new-product-image js-thumbnail-add-image" data-input="thumbnailedit" data-preview="holderedit">
                            Chọn hình ảnh
                            @if ($errors->first('thumbnail'))
                                <div class="error">{{ $errors->first('thumbnail') }}</div>
                            @endif
                        </a>
                        <div class="images-wrapper">
                            <input id="thumbnailedit" type="hidden" name="thumbnail" class="image-data" value="{{ $data->image_path }}">
                            <div class="text-center">
                                @if($data->image_path)
                                    <img width="120" id="holderedit" class="preview_image" src="{{ $data->image_path }}" type="text" name="filepath" alt="preview image">
                                @else
                                    <img width="120" id="holderedit" class="preview_image" src="{{ asset('template/images/placeholder.png') }}" type="text" name="filepath" alt="preview image">
                                @endif
                                <br>
                                <p style="color:#c3cfd8">Chọn nút <strong>Chọn hình ảnh</strong> để thêm ảnh.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="variation-images clearfix">
                <label for="attribute-images" class="required">
                    Hình ảnh
                </label>
                <div class="product-images-wrapper clearfix">
                    <a href="#" class="multi-image-variation add-new-product-image js-btn-trigger-add-image">
                        Chọn hình ảnh
                        @if ($errors->first('product_images'))
                            <div class="error">{{ $errors->first('product_images') }}</div>
                        @endif
                    </a>
                    <div class="images-wrapper">
                        <div class="text-center">
                            <p style="color:#c3cfd8">Chọn nút <strong>Chọn hình ảnh</strong> để thêm ảnh.</p>
                        </div>
                    </div>
                    <div class="images-show">
                        @if($product_image)
                            @foreach($product_image as $pri)
                                <div class="item-prev">
                                    <div class="atr-image">
                                        <img src="{{ $pri->image_file }}"/>
                                    </div>
                                    <div class="atr-elm">
                                        <input type="hidden" name="product_images[]" value="{{ $pri->image_file }}">
                                        <a class="atr-remove" href="javascript:void(0);" onclick="removeAtrImage()" data-dz-remove="">Xóa hình ảnh</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- ./wrapper -->
@include('admin.partials.scripts')
@include('admin.partials.alert')
<script type="text/javascript">
    $('#lfm').filemanager('image');
    $(window).on("load", (function() {
        $.fn.customthumbnailfilemanager = function(type, options) {
            type = type || 'file';

            this.on('click', function(e) {
              var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
              var target_input = $('#' + $(this).data('input'));
              var target_preview = $('#' + $(this).data('preview'));
              window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
              window.SetUrl = function (items) {
                var file_path = items.map(function (item) {
                  return item.url;
                }).join(',');

                // set the value of the desired input to image url
                target_input.val('').val(file_path).trigger('change');

                // clear previous preview
                target_preview.html('');

                // set or change the preview image src
                items.forEach(function (item) {
                   $(target_preview).attr('src', item.thumb_url);
                });

                // trigger change event
                target_preview.trigger('change');
              };
              return false;
            });
        }
        $('.js-thumbnail-add-image').customthumbnailfilemanager('image');
        $.fn.customfilemanager = function(type, options) {
            type = type || 'file';

            this.on('click', function(e) {
              var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
              var target_input = $('#' + $(this).data('input'));
              var target_preview = $('#' + $(this).data('preview'));
              window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
              window.SetUrl = function (items) {
                var file_path = items.map(function (item) {
                  return item.url;
                }).join(',');

                // set the value of the desired input to image url
                target_input.val('').val(file_path).trigger('change');

                // clear previous preview
                target_preview.html('');

                // set or change the preview image src
                items.forEach(function (item) {
                    $('.images-show').append('<div class="item-prev"><div class="atr-image"><img src="'+item.url+'"/></div><div class="atr-elm"><input type="hidden" name="product_images[]" value="'+item.url+'"><a class="atr-remove" href="javascript:void(0);" onclick="removeAtrImage()" data-dz-remove="">Xóa hình ảnh</a></div></div>');
                    // $(target_preview).attr('src', item.thumb_url);
                });

                // trigger change event
                target_preview.trigger('change');
              };
              return false;
            });
        }
        $('.js-btn-trigger-add-image').customfilemanager('image');
        window.opener.popupCallback(); //Call callback function 
    }));
    function removeAtrImage() {
        console.log($(this).parents('.item-prev'));
        $(this).parents('.item-prev').remove();
    }
    function closeSelf(){
        // do something

        if(condition satisfied){
           alert("conditions satisfied, submiting the form.");
           document.forms['form-edit-varition'].submit();
           window.close();
        }else{
           alert("conditions not satisfied, returning to form");    
        }
    }
</script>
</body>
</html>