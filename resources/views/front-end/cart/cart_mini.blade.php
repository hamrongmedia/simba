<div class="site-nav-container-last">
    <button id="site-close-handle" class="site-close-handle" onclick="siteCloseHandle()">
        <img src="{{asset('images/clo.png')}}" alt="Đóng">
    </button>
    <p class="title">Giỏ hàng</p>
    <span class="textCartSide">Bạn đang có <span id="qtotalitems"><b>{{ $cart['total_quantity'] }}</b></span> sản phẩm trong giỏ hàng.</span>
    <div class="cart-view clearfix">
        <table id="cart-view">
            <tbody id="ajax-cart-form">
                @if($cartItems)
                    @foreach ($cartItems as $cartItem)
                        <tr class="item-cart item_{{ $loop->index+1 }}" data-id="{{ $cartItem->product_id }}">
                            <td class="img">
                                <a href="{{ route('product.detail',['slug'=>$cartItem->product_slug]) }}" target="_blank" title="{{ $cartItem->name }}">
                                    @if($cartItem->thumbnail)
                                        <img src="{{ $cartItem->thumbnail }}" alt="{{ $cartItem->name }}">
                                    @else
                                        <img src="{{asset('template/images/placeholder.png')}}" alt="{{ $cartItem->name }}">
                                    @endif
                                </a>
                            </td>
                            <td>
                                <input name="quantity" value="" class="quantity ajax-quantity" type="hidden">
                                <a class="pro-title-view" href="{{ route('product.detail',['slug'=>$cartItem->product_slug]) }}">{{ $cartItem->name }}</a>
                                <span class="pro-price-view">{{ \App\Helpers\Common::priceFormat($cartItem->price) }} ₫</span>
                                <span class="pro-price-view">Số lượng: {{ $cartItem->quantity }}</span>
                                @if($cartItem->type == \App\Models\Product::PRODUCT_ATTRIBUTE)
                                    <div class="variant">
                                        @if($cartItem->pav1_id)
                                            <span>Size : {{ $cartItem->pav1_value }}</span>
                                        @endif
                                        @if($cartItem->pav2_id)
                                            <span>Màu sắc : {{ $cartItem->pav2_value }}</span>
                                        @endif
                                    </div>
                                @endif
                                <div class="remove_link remove-cart delete_item">
                                    <a href="javascript:void(0);" class="quantity" onclick="removeProductCart({{ $cartItem->product_id }},'{{ route('ajax.cart.remove') }}')">Xóa</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="notification">
                        <td colspan="2" class="text-center">
                            Chưa có sản phẩm nào trong giỏ hàng
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        <span class="line"></span>
        <table class="table-total">
            <tbody>
                <tr>
                    <td class="text-left"><b>TỔNG TIỀN TẠM TÍNH:</b></td>
                    <td class="text-right" id="total-view-cart">{{ \App\Helpers\Common::priceFormat($cart['total_price']) }} ₫</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="{{route('checkout.index')}}" class="checkLimitCart linktocheckout button dark">Đặt hàng</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="{{ route('home') }}" class="linktocart button dark">Chọn thêm sản phẩm <i class="fa fa-arrow-right"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>