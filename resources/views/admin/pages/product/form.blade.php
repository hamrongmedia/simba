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
                <label for="name" class="control-label required">Tên sản phẩm(*)</label>
                <input id="name" type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ isset($data) ? $data->name : old('name') }}">
                @if ($errors->first('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label">Slug</label>
                <input type="text" name="slug" class="form-control" placeholder="Nhập slug">
                @if ($errors->first('slug'))
                    <div class="error">{{ $errors->first('slug') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label">Mô tả</label>
                <textarea class="form-control" rows="4"
                          placeholder="Nhập mô tả sản phẩm" data-counter="400"
                          name="description" cols="50"
                          id="description">{{ isset($data) ? $data->description : old('description') }}</textarea>
                @if ($errors->first('description'))
                    <div class="error">{{ $errors->first('description') }}</div>
                @endif
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label required">Giá</label>
                        <input type="text" name="price" class="form-control inputmask" placeholder="Nhập giá sản phẩm" value="{{ isset($data) ? $data->price : old('price') }}">
                        @if ($errors->first('price'))
                            <div class="error">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Giá khuyến mãi</label>
                        <input type="text" name="sale_price" class="form-control inputmask" placeholder="Nhập giá khuyến mãi sản phẩm" value="{{ isset($data) ? $data->title : old('sale_price') }}">
                        @if ($errors->first('sale_price'))
                            <div class="error">{{ $errors->first('sale_price') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label required">Mã sản phẩm</label>
                        <input type="text" name="product_code" class="form-control" placeholder="Nhập mã sản phẩm" value="{{ isset($data) ? $data->product_code : old('product_code') }}">
                        @if ($errors->first('product_code'))
                            <div class="error">{{ $errors->first('product_code') }}</div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="control-label required">Số lượng</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng" value="{{ isset($data) ? $data->quantity : old('quantity') }}">
                        @if ($errors->first('quantity'))
                            <div class="error">{{ $errors->first('quantity') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="assign-switch">
                    <label class="switch-label">
                        <input type="checkbox" class="switch-assign" name="type" @if(isset($data) && $data->type==2) checked @endif value="2">
                        <span class="slider round"></span>
                    </label>
                    <label class="d-inline-block">Sản phẩm đa thuộc tính</label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Nội dung</label>
                <textarea class="form-control editor" name="description" rows="3"
                        placeholder="Nhập nội dung" id="editor">{!! isset($data) ? $data->content : old('content') !!}</textarea>
            </div>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <label for="description" class="control-label ec-tooltip" data-toggle="tooltip"
                   data-placement="top" quantity="Hình ảnh sản phẩm">Hình ảnh sản phẩm <i
                    class="fa fa-question-circle fa-lg ml-1"></i></label>
        </div>
        <div class="box-body">
            <div class="form-group clearfix">
                <div class="dropzone-previews"></div>
                <div class="dropzone-deletes"></div>
            </div>
            <div class="form-group">
                <div class="dropzone sortable dz-clickable sortable" id="dropzone"></div>
            </div>
        </div>
    </div><!-- end.tab-content -->
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
                <input type="text" name="seo[meta_title]" class="form-control" placeholder="Nhập tiêu đề">
            </div>
            <div class="form-group">
                <label for="meta_des">Mô Tả</label>
                <textarea class="form-control" name="seo[meta_description]" rows="3" placeholder="Nhập mô tả ngắn"></textarea>
            </div>
            <div class="form-group">
                <label class="control-label">Meta Keyword</label>
                <input type="text" name="seo[meta_keyword]" class="form-control" placeholder="Nhập từ khóa">
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