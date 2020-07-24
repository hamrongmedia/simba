<form action="" method="POST" id="form-edit-varition">
    {{ csrf_field() }}
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
    <div class="variation-images" style="position: relative; border: 1px dashed #ccc; padding: 10px;">
        <div class="product-images-wrapper">
            <a href="#" class="add-new-product-image js-btn-trigger-add-image" data-input="thumbnailedit" data-preview="holderedit">Chọn hình ảnh
            </a>
            <div class="images-wrapper">
                <input id="thumbnailedit" type="hidden" name="thumbnail" class="image-data" value="{{ $data->image_path }}">
                <div class="text-center">
                    @if($data->image_path)
                        <img width="120" id="holderedit" class="preview_image" src="{{ Storage::url($data->image_path) }}" type="text" name="filepath" alt="preview image">
                    @else
                        <img width="120" id="holderedit" class="preview_image" src="{{ asset('template/images/placeholder.png') }}" type="text" name="filepath" alt="preview image">
                    @endif
                    <br>
                    <p style="color:#c3cfd8">Chọn nút <strong>Chọn hình ảnh</strong> để thêm ảnh.</p>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
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
                    $(target_preview).attr('src', item.thumb_url);
                });

                // trigger change event
                target_preview.trigger('change');
              };
              return false;
            });
        }
        $('.js-btn-trigger-add-image').customfilemanager('image');
</script>