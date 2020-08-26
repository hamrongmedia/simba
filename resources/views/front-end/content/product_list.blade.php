<div class="col-md-3 col-sm-4 col-xs-6">
    <div class="wp-item-sp">
        <!--màu sắc -->
        <div style="position: relative">
            <div class="wp-list-sp-slide">
                @if($data->type == \App\Models\Product::PRODUCT_ATTRIBUTE)
                    @php 
                        $color_ids = explode(',',$data->color_ids);
                    @endphp
                    @foreach($color_ids as $color_id)
                        <div class="wp-item-sp-main @if($loop->first) active @endif">
                            @if( isset($data->img_attr[$color_id]) )
                                <div class="slide-sp owl-carousel">
                                    @foreach($data->img_attr[$color_id] as $img)
                                            <div class="item">
                                                <div class="wp-img-slide-sp">
                                                    <a href="{{ route('product.detail',['slug'=>$data->slug]) }}" title="{{ $data->name }}">
                                                        <img class="el_image" src="{{ $img }}">
                                                    </a>
                                                </div>
                                            </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="slide-sp owl-carousel">
                                    <div class="item">
                                        <div class="wp-img-slide-sp">
                                            <a href="{{ route('product.detail',['slug'=>$data->slug]) }}" title="{{ $data->name }}">
                                                <img class="el_image" src="{{ $data->thumbnail }}"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>                                
                            @endif
                        </div> <!-- end slider 1 -->
                    @endforeach
                @else 
                    <div class="wp-item-sp-main active">
                        <div class="slide-sp owl-carousel">
                            <div class="item">
                                <div class="wp-img-slide-sp">
                                    <a href="{{ route('product.detail',['slug'=>$data->slug]) }}" title="{{ $data->name }}">
                                        <img class="el_image" src="{{ $data->thumbnail }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end slider 1 -->
                @endif
            </div>
            <div class="wp-add-to-cart">
                <a href="{{ route('product.detail',['slug'=>$data->slug]) }}" title="{{ $data->name }}">
                    <span>Thêm vào giỏ</span>
                    <i class="fas fa-shopping-bag"></i>
                </a>
            </div>
        </div>
        <!--end màu sắc-->
        <div class="wp-name-sp">
            <h3 class="h3-title">
                <a href="{{ route('product.detail',['slug'=>$data->slug]) }}" title="{{ $data->name }}">
                    {{ $data->name }}
                </a>
            </h3>
        </div>
        {!! \App\Helpers\Common::priceProduct($data) !!}
        <!--màu sắc đầu tiên-->
        @if($data->type == \App\Models\Product::PRODUCT_ATTRIBUTE)
            <div class="wp-list-check-color">
                <ul class="ul-b list-color-sp">
                    @php 
                        $arr_imgatt = explode(',',$data->images_path);
                    @endphp
                    @foreach($arr_imgatt as $imgAttr)
                        <li class="item-color color-1 @if($loop->first) active @endif">
                            <span style="background: url('{{ $imgAttr }}')"></span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!--end màu sắc đầu tiên-->
        @endif
    </div>
</div> <!-- end 1 sản phẩm -->

