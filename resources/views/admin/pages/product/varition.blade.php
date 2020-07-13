<div id="product-variations-wrapper">
    <div class="variation-actions">
        <a href="#" class="btn-trigger-select-product-attributes" data-target="http://hasa.botble.com/admin/ecommerce/products/store-related-attributes/36">Edit attribute</a>
        <a href="#" class="btn-trigger-add-new-product-variation" data-target="http://hasa.botble.com/admin/ecommerce/products/add-version/36">Add variation</a>
        <a href="#" class="btn-trigger-generate-all-versions" data-target="http://hasa.botble.com/admin/ecommerce/products/generate-all-version/36">Generate all variations</a>
    </div>
    <table class="table table-hover-variants">
        <thead>
            <tr>
                <th>Hình ảnh</th>
                @if(count($product_attribute_map)>0)
                    @foreach($product_attribute_map as $pi)
                        <th>{{ $pi->name }}</th>
                    @endforeach
                @endif
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($product_info)>0)
                @foreach($product_info as $pi)
                    <tr>
                        <td>
                            <div class="wrap-img-product">
                                @if($data->thumbnail)
                                  <img class="thumb" src="{{ asset($data->thumbnail) }}" alt="{{ $data->name }}">
                                @else
                                  <img class="thumb" src="{{ asset('assets/images/placeholder.png') }}" alt="no photo">
                                @endif
                            </div>
                        </td>
                        <td>{{ $pi->pav1_value }}</td>
                        @if(count($product_attribute_map)==2)
                            <td>{{ $pi->pav2_value }}</td>
                        @endif
                        <td style="width: 180px;" class="text-center">
                            <a href="#" class="btn btn-info btn-trigger-edit-product-version" data-target="http://hasa.botble.com/admin/ecommerce/products/update-version/31" data-load-form="http://hasa.botble.com/admin/ecommerce/products/get-version-form/31">Sửa</a>
                            <a href="#" data-target="{{ route('product-info',['id'=>$pi->id]) }}" class="btn-trigger-delete-version btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div id="select-attribute-sets-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog    ">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"><i class="til_img"></i><strong>Select attribute</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body with-padding">
                    <label>
                        <input type="checkbox" class="hrv-checkbox attribute-set-item" name="attribute_sets[]" value="2">
                        Size
                    </label> &nbsp;
                    <label>
                        <input type="checkbox" class="hrv-checkbox attribute-set-item" name="attribute_sets[]" value="1" checked="">
                        Color
                    </label> &nbsp;

                </div>

                <div class="modal-footer">
                    <button class="float-left btn btn-warning" data-dismiss="modal">Cancel</button>
                    <a class="float-right btn btn-info" id="store-related-attributes-button" href="#">Save changes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->
    <div id="add-new-product-variation-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog    modal-lg  ">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"><i class="til_img"></i><strong>Add new variation</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body with-padding">
                    <div class="variation-form-wrapper">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label for="attribute-color" class="text-title-field required" aria-required="true">Color</label>
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
                                            <option value="11">
                                                Brown
                                            </option>
                                        </select>
                                        <svg class="svg-next-icon svg-next-icon-size-16">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row price-group">
                            <input type="hidden" value="0" class="detect-schedule hidden" name="sale_type">

                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label class="text-title-field">Sku</label>
                                    <input class="next-input" id="sku" data-counter="30" name="sku" type="text">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-title-field">Price</label>
                                    <div class="next-input--stylized">
                                        <span class="next-input-add-on next-input__add-on--before">$</span>
                                        <input name="price" class="next-input input-mask-number regular-price next-input--invisible" step="any" value="500" type="text" im-insert="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-title-field">
                                        <span>Price sale</span>
                                        <a href="javascript:;" class="turn-on-schedule ">Choose Discount Period</a>
                                        <a href="javascript:;" class="turn-off-schedule  hidden ">Cancel</a>
                                    </label>
                                    <div class="next-input--stylized">
                                        <span class="next-input-add-on next-input__add-on--before">$</span>
                                        <input name="sale_price" class="next-input input-mask-number sale-price next-input--invisible" value="" type="text" im-insert="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 scheduled-time  hidden ">
                                <div class="form-group">
                                    <label class="text-title-field">To date</label>
                                    <input name="start_date" class="next-input form-date-time" value="" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 scheduled-time  hidden ">
                                <div class="form-group">
                                    <label class="text-title-field">From date</label>
                                    <input name="end_date" class="next-input form-date-time" value="" type="text">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="storehouse-management">
                                <div class="mt5">
                                    <input type="hidden" name="with_storehouse_management" value="0">
                                    <label><input type="checkbox" class="hrv-checkbox storehouse-management-status" value="1" name="with_storehouse_management"> With storehouse management</label>
                                </div>
                            </div>
                        </div>
                        <div class="storehouse-info  hidden ">
                            <div class="form-group">
                                <label class="text-title-field">Quantity</label>
                                <input type="text" class="next-input input-mask-number input-medium" value="0" name="quantity" im-insert="true">
                            </div>
                            <div class="form-group">
                                <label class="text-title-field">
                                    <input type="hidden" name="allow_checkout_when_out_of_stock" value="0">
                                    <input type="checkbox" name="allow_checkout_when_out_of_stock" class="hrv-checkbox" value="1">
                                    &nbsp;Allow customer checkout when this product out of stock
                                </label>
                            </div>
                        </div>

                        <hr>

                        <div class="shipping-management">
                            <label class="text-title-field">Shipping</label>
                            <div class="row">
                                <div class="col-md-3 col-md-6">
                                    <div class="form-group">
                                        <label>Weight (g)</label>
                                        <div class="next-input--stylized">
                                            <span class="next-input-add-on next-input__add-on--before">g</span>
                                            <input type="text" class="next-input input-mask-number next-input--invisible" name="weight" value="100" im-insert="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-6">
                                    <div class="form-group">
                                        <label>Length (cm)</label>
                                        <div class="next-input--stylized">
                                            <span class="next-input-add-on next-input__add-on--before">cm</span>
                                            <input type="text" class="next-input input-mask-number next-input--invisible" name="length" value="10" im-insert="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-6">
                                    <div class="form-group">
                                        <label>Wide (cm)</label>
                                        <div class="next-input--stylized">
                                            <span class="next-input-add-on next-input__add-on--before">cm</span>
                                            <input type="text" class="next-input input-mask-number next-input--invisible" name="wide" value="10" im-insert="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-6">
                                    <div class="form-group">
                                        <label>Height (cm)</label>
                                        <div class="next-input--stylized">
                                            <span class="next-input-add-on next-input__add-on--before">cm</span>
                                            <input type="text" class="next-input input-mask-number next-input--invisible" name="height" value="10" im-insert="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="variation-images" style="position: relative; border: 1px dashed #ccc; padding: 10px;">
                            <div class="product-images-wrapper">
                                <a href="#" class="add-new-product-image js-btn-trigger-add-image" data-name="images[]">Add image
                                </a>
                                <div class="images-wrapper">
                                    <div data-name="images[]" class="text-center cursor-pointer js-btn-trigger-add-image default-placeholder-product-image ">
                                        <img src="http://hasa.botble.com/vendor/core/images/placeholder.png" alt="Image" width="120">
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
                    <button class="float-left btn btn-warning" data-dismiss="modal">Cancel</button>
                    <a class="float-right btn btn-info" id="store-product-variation-button" href="#">Save changes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->
    <div id="edit-product-variation-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" style="display: none;" aria-hidden="true">
        <div class="modal-dialog    modal-lg  ">
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
                            <div class="col-md-4 col-sm-6">
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
                                        <svg class="svg-next-icon svg-next-icon-size-16">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row price-group">
                            <input type="hidden" value="0" class="detect-schedule hidden" name="sale_type">

                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label class="text-title-field">Sku</label>
                                    <input class="next-input" id="sku" data-counter="30" name="sku" type="text" value="WL-1-brown">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-title-field">Price</label>
                                    <div class="next-input--stylized">
                                        <span class="next-input-add-on next-input__add-on--before">$</span>
                                        <input name="price" class="next-input input-mask-number regular-price next-input--invisible" step="any" value="500" type="text" im-insert="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-title-field">
                                        <span>Price sale</span>
                                        <a href="javascript:;" class="turn-on-schedule ">Choose Discount Period</a>
                                        <a href="javascript:;" class="turn-off-schedule  hidden ">Cancel</a>
                                    </label>
                                    <div class="next-input--stylized">
                                        <span class="next-input-add-on next-input__add-on--before">$</span>
                                        <input name="sale_price" class="next-input input-mask-number sale-price next-input--invisible" value="" type="text" im-insert="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 scheduled-time  hidden ">
                                <div class="form-group">
                                    <label class="text-title-field">To date</label>
                                    <input name="start_date" class="next-input form-date-time" value="" type="text">
                                </div>
                            </div>
                            <div class="col-md-6 scheduled-time  hidden ">
                                <div class="form-group">
                                    <label class="text-title-field">From date</label>
                                    <input name="end_date" class="next-input form-date-time" value="" type="text">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="storehouse-management">
                                <div class="mt5">
                                    <input type="hidden" name="with_storehouse_management" value="0">
                                    <label><input type="checkbox" class="hrv-checkbox storehouse-management-status" value="1" name="with_storehouse_management"> With storehouse management</label>
                                </div>
                            </div>
                        </div>
                        <div class="storehouse-info  hidden ">
                            <div class="form-group">
                                <label class="text-title-field">Quantity</label>
                                <input type="text" class="next-input input-mask-number input-medium" value="0" name="quantity" im-insert="true">
                            </div>
                            <div class="form-group">
                                <label class="text-title-field">
                                    <input type="hidden" name="allow_checkout_when_out_of_stock" value="0">
                                    <input type="checkbox" name="allow_checkout_when_out_of_stock" class="hrv-checkbox" value="1">
                                    &nbsp;Allow customer checkout when this product out of stock
                                </label>
                            </div>
                        </div>

                        <hr>

                        <div class="shipping-management">
                            <label class="text-title-field">Shipping</label>
                            <div class="row">
                                <div class="col-md-3 col-md-6">
                                    <div class="form-group">
                                        <label>Weight (g)</label>
                                        <div class="next-input--stylized">
                                            <span class="next-input-add-on next-input__add-on--before">g</span>
                                            <input type="text" class="next-input input-mask-number next-input--invisible" name="weight" value="100" im-insert="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-6">
                                    <div class="form-group">
                                        <label>Length (cm)</label>
                                        <div class="next-input--stylized">
                                            <span class="next-input-add-on next-input__add-on--before">cm</span>
                                            <input type="text" class="next-input input-mask-number next-input--invisible" name="length" value="10" im-insert="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-6">
                                    <div class="form-group">
                                        <label>Wide (cm)</label>
                                        <div class="next-input--stylized">
                                            <span class="next-input-add-on next-input__add-on--before">cm</span>
                                            <input type="text" class="next-input input-mask-number next-input--invisible" name="wide" value="10" im-insert="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-6">
                                    <div class="form-group">
                                        <label>Height (cm)</label>
                                        <div class="next-input--stylized">
                                            <span class="next-input-add-on next-input__add-on--before">cm</span>
                                            <input type="text" class="next-input input-mask-number next-input--invisible" name="height" value="10" im-insert="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="variation-images" style="position: relative; border: 1px dashed #ccc; padding: 10px;">
                            <div class="product-images-wrapper">
                                <a href="#" class="add-new-product-image js-btn-trigger-add-image" data-name="images[]">Add image
                                </a>
                                <div class="images-wrapper">
                                    <div data-name="images[]" class="text-center cursor-pointer js-btn-trigger-add-image default-placeholder-product-image ">
                                        <img src="http://hasa.botble.com/vendor/core/images/placeholder.png" alt="Image" width="120">
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
                    <button class="float-left btn btn-warning" data-dismiss="modal">Cancel</button>
                    <a class="float-right btn btn-info" id="update-product-variation-button" href="#">Save changes</a>
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
                    <button class="float-left btn btn-warning" data-dismiss="modal">Cancel</button>
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
                    <button class="float-left btn btn-warning" data-dismiss="modal">Cancel</button>
                    <a class="float-right btn btn-danger" id="delete-version-button" href="#">Continue</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->
</div>