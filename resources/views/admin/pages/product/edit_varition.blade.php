<form action="" method="POST" id="form-edit-varition">
    {{ csrf_field() }}
    <div class="row">
        @if( count($product_attribute_map) > 0 )
            @foreach($product_attribute_map as $pam)
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
            @endforeach
        @endif
    </div>
    <div class="variation-images" style="position: relative; border: 1px dashed #ccc; padding: 10px;">
        <div class="product-images-wrapper">
            <a href="#" class="add-new-product-image js-btn-trigger-add-image" data-input="thumbnail" data-preview="holder">Chọn hình ảnh
            </a>
            <div class="images-wrapper">
                <input id="thumbnail" type="hidden" name="thumbnail" class="image-data" value="{{ $data->image_path }}">
                <div class="text-center">
                    @if($data->image_path)
                        <img width="120" id="holder" class="preview_image" src="{{ Storage::url($data->image_path) }}" type="text" name="filepath" alt="preview image">
                    @else
                        <img width="120" id="holder" class="preview_image" src="{{ asset('admin/images/placeholder.png') }}" type="text" name="filepath" alt="preview image">
                    @endif
                    <br>
                    <p style="color:#c3cfd8">Chọn nút <strong>Chọn hình ảnh</strong> để thêm ảnh.</p>
                </div>
            </div>
        </div>
    </div>
</form>