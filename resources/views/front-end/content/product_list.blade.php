<div class="col-md-3 col-sm-4 col-xs-6">
    <div class="wp-item-sp">
        <!--màu sắc -->
        <div style="position: relative">
            <div class="wp-list-sp-slide">
                <div class="wp-item-sp-main active">
                    <div class="slide-sp owl-carousel">
                        <div class="item">
                            <div class="wp-img-slide-sp">
                                <a href="{{ route('product.detail',['slug'=>$data->product_slug]) }}" title="{{ $data->name }}">
                                    <img class="el_image" src="https://venuscharm.vn/uploads/products/1590309691.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end slider 1 -->
            </div>
            <div class="wp-add-to-cart">
                <a href="{{ route('product.detail',['slug'=>$data->product_slug]) }}" title="{{ $data->name }}">
                    <span>Thêm vào giỏ</span>
                    <i class="fas fa-shopping-bag"></i>
                </a>
            </div>
        </div>
        <!--end màu sắc-->
        <div class="wp-name-sp">
            <h3 class="h3-title">
                <a href="{{ route('product.detail',['slug'=>$data->product_slug]) }}" title="{{ $data->name }}">
                    {{ $data->name }}
                </a>
            </h3>
        </div>
        <div class="wp-price-sp">
            <span class="int">{{ \App\Helpers\Common::priceFormat($data->price) }}đ</span>
        </div>
        <!--màu sắc đầu tiên-->
        <div class="wp-list-check-color">
            <ul class="ul-b list-color-sp">
                <li class="item-color color-1 active">
                    <span style="background: url('{{asset('images-demo/1590839575.jpg')}}')"></span>
                </li>
                <li class="item-color color-1">
                    <span style="background: url('{{asset('images-demo/1590839542.jpg')}}')"></span>
                </li>
            </ul>
        </div>
        <!--end màu sắc đầu tiên-->
    </div>
</div> <!-- end 1 sản phẩm -->

