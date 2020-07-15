    <div class="variation-actions">
        <a href="#" class="btn-trigger-select-product-attributes" data-target="http://hasa.botble.com/admin/ecommerce/products/store-related-attributes/36">
            Chỉnh thuộc tính
        </a>
        <a href="#" class="btn-trigger-add-new-product-variation" data-target="http://hasa.botble.com/admin/ecommerce/products/add-version/36">
            Thêm biến thể mới
        </a>
        <a href="#" class="btn-trigger-generate-all-versions" data-target="http://hasa.botble.com/admin/ecommerce/products/generate-all-version/36">
            Tạo toàn bộ biến thể
        </a>
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
                                @if($pi->image_path)
                                  <img class="thumb" src="{{ Storage::url($pi->image_path) }}" alt="{{ $data->name }}" width="50px;">
                                @elseif($data->thumbnail)
                                  <img class="thumb" src="{{ Storage::url($data->thumbnail) }}" alt="{{ $data->name }}" width="50px;">
                                @else
                                  <img class="thumb" src="{{ asset('admin/images/placeholder.png') }}" alt="no photo" width="50px;">
                                @endif
                            </div>
                        </td>
                        <td>{{ $pi->pav1_value }}</td>
                        @if(count($product_attribute_map)==2)
                            <td>{{ $pi->pav2_value }}</td>
                        @endif
                        <td style="width: 180px;" class="text-center">
                            <a href="#" class="btn btn-info btn-trigger-edit-product-version" data-target="http://hasa.botble.com/admin/ecommerce/products/update-version/31" data-load-form="http://hasa.botble.com/admin/ecommerce/products/get-version-form/31">Sửa</a>
                            <a href="#" data-target="{{ route('admin.product.info.delete',['id'=>$pi->id]) }}" class="btn-trigger-delete-version btn btn-danger">Xóa</a>
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
                    <button class="float-left btn btn-warning" data-dismiss="modal">Hủy bỏ</button>
                    <a class="float-right btn btn-info" id="store-related-attributes-button" href="#">Lưu thay đổi</a>
                </div>
            </div>
        </div>
    </div>