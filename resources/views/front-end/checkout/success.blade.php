<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <base href="#">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="vi">
    <link rel="alternate" href="#" hreflang="vi-vn">
    <meta name="robots" content="index,follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Venus Charm">
    <meta name="copyright" content="Venus Charm">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">

    <title>Đặt mua thành công</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- thư viện css -->
    <link rel="stylesheet"  href="{{asset('css/fontawesome.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('css/all.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('css/jquery.fancybox.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('css/owl.carousel.css')}}"/>
    <!-- code css -->
    <link rel="stylesheet"  href="{{asset('css/style.css')}}"/>
</head>


{{-- @section('title')
 Thanh toán
@endsection --}}

<!-- yêu cầu người code chức năng để ý kỹ code html của các trang copy thiếu hay tự làm lỗi thì tự chỉnh -->
<body class="page-child">
    @include('front-end.partials.header.header')
    <!-- Nội dung conter -->
    <main id="main-thanhtoan">
        <div class="container">
            <div class="wp-header-thanhtoan">
                <div class="wp-logo-fft">
                    <a href="{{url('/')}}">
                        <img class="img-responsive" src="{{isset($themeOptionHeader->logo_setting) ? $themeOptionHeader->logo_setting : '#'}}" alt="">
                     </a>
                </div>
                <p><i class="fas fa-question-circle"></i><span> Đặt hàng thành công</span></p>
            </div><form action="">
            <div class="row row-tt">
                
                <div class="col-md-6 col-sm-12 col-xs-12 fl-right">
                    <div class="wp-right-tt">
                        <div class="wp-list-sp">
                            <ul class="ul-b list-sp-tt">
                                @if($datas)
                                    @foreach ($datas as $cartItem)
                                        <li class="item-sp-tt">
                                            <div class="img-sp-tt">
                                                <a href="{{ route('product.detail',['slug'=>$cartItem->product_slug]) }}" target="_blank" title="{{ $cartItem->name }}">
                                                    @if($cartItem->thumbnail)
                                                        <img src="{{ $cartItem->thumbnail }}" alt="{{ $cartItem->name }}">
                                                    @else
                                                        <img src="{{asset('template/images/placeholder.png')}}" alt="{{ $cartItem->name }}">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="text-sp-tt">
                                                <h4 class="h4-title">{{ $cartItem->name }}</h4>
                                                <div class="price">
                                                    <span>{{ \App\Helpers\Common::priceFormat($cartItem->price) }}đ</span>
                                                </div>
                                                <span class="pro-price-view">Số lượng: {{ $cartItem->quantity }}</span>
                                                @if($cartItem->type == \App\Models\Product::PRODUCT_ATTRIBUTE)
                                                    <ul class="mau-size">
                                                        @if($cartItem->pav1_id)
                                                            <li>Size : {{ $cartItem->pav1_value }}</li>
                                                        @endif
                                                        @if($cartItem->pav2_id)
                                                            <li>Màu sắc : {{ $cartItem->pav2_value }}</li>
                                                        @endif
                                                    </ul>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="list-thanhtien">
                            <ul class="ul-b list-da">
                                <li>
                                    <span>Tạm tính</span>
                                    <span class="sp2">{{ \App\Helpers\Common::priceFormat($order->subtotal) }}đ</span>
                                </li>
                                <li>
                                    <span>Phí vận chuyển</span>
                                    <input type="hidden" name="shipcode">
                                    <div class="price_tt sp2" id="shipcode_value" data-price="">
                                        <span id="shipcode-uppercase">{{ \App\Helpers\Common::priceFormat($order->delivery_fee_total) }}đ</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tongtien">
                            <div class="">
                                <span>Tổng cộng</span>
                                <span id="price_tt" class="sp2">{{ \App\Helpers\Common::priceFormat($order->payment_total) }} đ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 fl-left">
                    <div class="wp-left-tt">
                        <h2 class="h2-title ">Thông tin giao hàng</h2>
                        <div class="wp-form-tt">
                            <p class=""><strong>Họ và tên:</strong> {{ $order->fullname }}</p>
                            <p class=""><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                            <p class=""><strong>Email:</strong> {{ $order->email }}</p>
                            <p class=""><strong>Tỉnh/Thành phố:</strong> {{ $order->province->name }}</p>
                            <p class=""><strong>Quận/Huyện:</strong> {{ $order->district->name }}</p>
                            <p class=""><strong>Phường/Xã:</strong> {{ $order->ward->name }}</p>
                            <p class=""><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                            <p class=""><strong>Nội dung:</strong> {{ $order->message }}</p>
                            <p class=""><strong>Tổng tiền:</strong> {{ \App\Helpers\Common::priceFormat($order->payment_total) }}đ</p>
                            <div class="btn-thanhtoan">
                                <a href="{{ route('home') }}"><i class="fas fa-arrow-left"></i>&nbsp;Tiếp tục mua hàng</a>
                                <button type="submit" name="create" value="create" class="uk-button btn btn-default" style="border: 0px">
                                    Đặt hàng thành công
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
           </form>

        </div>
    </main>

    <!-- chân trang -->
     @include('front-end.partials.footer.footer')
</body>

<style>
    #footer-site,
    #header-site{
        display: none;
    }

    .wp-form-tt p strong {
        font-weight: 500;
    }

</style>


@include('front-end.partials.footer.js')
</html>
