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

    <!-- các thẻ meta -->

    <meta name="keywords" content="Venus Charm">
    <meta name="description" content="Venus Charm">
    <meta name="revisit-after" content="1 days">
    <meta name="rating" content="general">
    
    <!-- for Facebook -->
    <meta property="og:title" content="Venus Charm">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{asset('images-demo/venus-charm-banner-dau-trang-1-.jpg')}}">
    <meta property="og:description" content="Venus Charm">
    <meta property="og:site_name" content="Venus Charm">
    <meta property="fb:admins" content="">
    <meta property="fb:app_id" content="">

    <!-- for Twitter -->          
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Venus Charm">
    <meta name="twitter:description" content="Venus Charm">
    <meta name="twitter:image" content="{{asset('images-demo/venus-charm-banner-dau-trang-1-.jpg')}}">
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}">

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
                    <a href=""><img src="{{asset('images/logo.png')}}" alt="Venus Charm"></a>
                </div>
                <p><i class="fas fa-question-circle"></i><span> Đặt hàng thành công</span></p>
            </div><form action="">
            <div class="row row-tt">
                
                <div class="col-md-6 col-sm-12 col-xs-12 fl-right">
                    <div class="wp-right-tt">
                        <div class="wp-list-sp">
                            <ul class="ul-b list-sp-tt">
                                <li class="item-sp-tt">
                                    <div class="img-sp-tt">
                                        <a href="ao-freedom-1805-p846.html"><img src="{{asset('images-demo/1590838844.jpg')}}" alt="Áo Freedom 1805"></a>
                                    </div>
                                    <div class="text-sp-tt">
                                        <h4 class="h4-title">Áo Freedom 1805</h4>
                                        <div class="price">
                                            <span>259.000đ</span>
                                        </div>
                                        <span class="pro-price-view">Số lượng: 1</span>
                                        <div class="mau-size">
                                            <ul class="ul-b list-tt111">
                                                <li>Size:34</li>
                                                <li>Màu sắc:Da</li>

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="list-thanhtien">
                            <ul class="ul-b list-da">
                                <li>
                                    <span>Tạm tính</span>
                                    <span class="sp2">259.000đ</span>
                                </li>
                                <li>
                                    <span>Phí vận chuyển</span>
                                    <input type="hidden" name="shipcode">
                                    <div class="price_tt sp2" id="shipcode_value" data-price=""><input type="hidden" name="shipcode_value" value="0"><span id="shipcode-uppercase">259.000đ</span></div>
                                </li>
                            </ul>
                        </div>
                        <div class="tongtien">
                            <div class="">
                                <input type="hidden" name="userid" value="">
                                <input type="hidden" name="total_cart_money" id="total_cart_money" value="259000">
                                <span>Tổng cộng</span>
                                <span id="price_tt" class="sp2">259.000 đ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 fl-left">
                    <div class="wp-left-tt">
                        <h2 class="h2-title ">Thông tin giao hàng</h2>
                        <div class="wp-form-tt">
                            <p class=""><strong>Họ và tên:</strong> Hoàng</p>
                            <p class=""><strong>Số điện thoại:</strong> 099*****000</p>
                            <p class=""><strong>Email:</strong> admin@gmail.com</p>
                            <p class=""><strong>Tỉnh/Thành phố:</strong> Thanh Hóa</p>
                            <p class=""><strong>Quận/Huyện:</strong> Hai Bà Trưng</p>
                            <p class=""><strong>Phường/Xã:</strong> Ngọc mai</p>
                            <p class=""><strong>Địa chỉ:</strong> Đống đa</p>
                            <p class=""><strong>Nội dung:</strong> Mua đồ</p>
                            <p class=""><strong>Tổng tiền:</strong> 5994.59484đ</p>
                            <div class="btn-thanhtoan">
                                <a href="javascript:void(0);" onclick="goBack()"><i class="fas fa-arrow-left"></i>&nbsp;Tiếp tục mua hàng</a>
                                <button type="submit" name="create" value="create" class="uk-button btn btn-default" style="border: 0px">Đặt hàng thành công</button>
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
