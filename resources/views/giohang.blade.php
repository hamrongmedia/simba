<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <base href="https://venuscharm.vn/">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="vi">
    <link rel="alternate" href="https://venuscharm.vn/" hreflang="vi-vn">
    <meta name="robots" content="index,follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Venus Charm">
    <meta name="copyright" content="Venus Charm">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">

    <title>Giỏ hàng</title>

    <!-- các thẻ meta -->

    <meta name="keywords" content="Venus Charm">
    <meta name="description" content="Venus Charm">
    <meta name="revisit-after" content="1 days">
    <meta name="rating" content="general">
    
    <!-- for Facebook -->
    <meta property="og:title" content="Venus Charm">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{asset('images/venus-charm-banner-dau-trang-1-.jpg')}}">
    <meta property="og:description" content="Venus Charm">
    <meta property="og:site_name" content="Venus Charm">
    <meta property="fb:admins" content="">
    <meta property="fb:app_id" content="">

    <!-- for Twitter -->          
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Venus Charm">
    <meta name="twitter:description" content="Venus Charm">
    <meta name="twitter:image" content="{{asset('images/venus-charm-banner-dau-trang-1-.jpg')}}">
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
<!-- yêu cầu người code chức năng để ý kỹ code html của các trang copy thiếu hay tự làm lỗi thì tự chỉnh -->
<body class="page-child">
    <header id="header-site" style="display: none;">
        <div class="wp-header">
             <div id="sticky-wrapper" class="sticky-wrapper">
                <div class="main-menu-bar sticky-header-enable">
                    <div class="wp-main-header clearfix ">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <div class="wp-header-mobile">
                                        <div class="wp-logo text-center">
                                            <!-- /** Yêu cầu trang chủ để logo h1 còn các trang khác để h2 **/ -->
                                            <h1 class="entry-title">
                                                <a href="">
                                                    <img class="img-responsive" src="{{asset('images/logo.png')}}" alt="">
                                                </a>
                                            </h1>
                                        </div>
                                        <div class="wp-menu-mobile hidden-lg hidden-md">
                                            <div id="trigger-mobile">
                                                <span class="bar bar1"></span>
                                                <span class="bar bar2"></span>
                                                <span class="bar bar3"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="box-search-mb hidden-lg hidden-md">
                                            <button class="btn btn-default btn-search-mb"><i class="fas fa-search"></i></button>
                                            <div class="wp-box-search-mb">
                                                <form action="tim-kiem.html" method="get">
                                                    <input type="text" class="form-control" name="key" value="" placeholder="Nhập từ khóa cần tìm kiếm">
                                                    <button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                         <div class="wp-cart-mb hidden-lg hidden-md">
                                            <div class="cart-mb">
                                                <a class="btn-click-cart">
                                                    <img src="{{asset('images/icon-cart.png')}}" alt="icon giỏ hàng">
                                                </a>
                                            </div>
                                            <span>0</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 hidden-sm hidden-xs">
                                    <div class="wp-main-menu clearfix">
                                        <nav id="main-menu" class=" navbar navbar-default" role="navigation">
                                            <div class="collapse navbar-collapse navbar-ex1-collapse" style="padding: 0px;">
                                                <ul class="nav navbar-nav navbar-left" id="primary-menu">
                                                    <li class="dropdown">
                                                        <a href="#"><span>Áo lót</span></a>
                                                        <span class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down"></i></span>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="#" title="Áo lót đệm dày">Áo lót đệm dày</a>
                                                            </li>
                                                            <li>
                                                                <a href="l" title="Áo lót đệm vừa">Áo lót đệm vừa</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Áo lót đệm mỏng">Áo lót đệm mỏng</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Áo lót không gọng">Áo lót không gọng</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Áo lót có gọng">Áo lót có gọng</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Bralette">Bralette</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Áo lót tạo kiểu">Áo lót tạo kiểu</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Phụ kiện áo lót">Phụ kiện áo lót</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="#"><span>Quần Lót</span></a>
                                                        <span class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down"></i></span>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="#" title="Combo tiết kiệm">Combo tiết kiệm</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Quần lót cotton">Quần lót cotton</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Quần lót ren">Quần lót ren</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Quần lót không viền">Quần lót không viền</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Quần lót thun lạnh">Quần lót thun lạnh</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Quần lót lọt khe"> Quần lót lọt khe</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Quần lót 3/4 mông"> Quần lót 3/4 mông</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Quần lót cả mông">Quần lót cả mông</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="#"><span>Set bras</span></a>
                                                        <span class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down"></i></span>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="#" title="Bộ đồ lót đệm dày">Bộ đồ lót đệm dày</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Bộ đồ lót đệm vừa"> Bộ đồ lót đệm vừa</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Bộ đồ lót đệm mỏng">Bộ đồ lót đệm mỏng</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Bộ đồ lót sexy">Bộ đồ lót sexy</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Bộ đồ lót ren">Bộ đồ lót ren</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="#"><span>Đồ ngủ</span></a>
                                                        <span class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down"></i></span>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="#" title="Váy ngủ sexy">Váy ngủ sexy</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Pijama dài tay">Pijama dài tay</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Pijama cộc tay">Pijama cộc tay</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Bộ ngủ 2 dây">Bộ ngủ 2 dây</a>
                                                            </li>
                                                            <li>
                                                                <a href="l" title="Áo choàng ngủ">Áo choàng ngủ</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#"><span>Blog</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div> <!-- end wp-main-menu -->
                                </div>
                                <div class="col-md-4 hidden-sm hidden-xs">
                                    <div class="wp-main-header-right">
                                        <?php /** form đăng ký **/ ?>
                                        <div class="wp-search">
                                            <form action="" method="get">
                                                <button class="btn btn-default btn-search" type="submit">
                                                    <i class="far fa-search" aria-hidden="true"></i>
                                                </button>
                                                <input type="text" placeholder="Bạn cần tìm gì" value="" name="key" class="form-control">
                                            </form>
                                        </div><!--  end -->
                                        <div class="wp-user">
                                            <i class="far fa-user"></i>
                                            <div class="wp-sub-menu">
                                                <ul class="ul-b list-login">
                                                    <li><a href="#">Đăng nhập</a></li>
                                                    <li><a href="#">Đăng ký</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="wp-cart">
                                            <a class="btn-click-cart"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="site-cart" class="">
                                    <div class="site-nav-container-last">
                                        <button id="site-close-handle" class="site-close-handle">
                                            <img src="{{asset('images/clo.png')}}" alt="Đóng">
                                        </button>
                                        <p class="title">Giỏ hàng</p>
                                        <span class="textCartSide">Bạn đang có <span id="qtotalitems"><b>1</b></span> sản phẩm trong giỏ hàng.</span>
                                        <div class="cart-view clearfix">
                                            <table id="cart-view">
                                                <tbody id="ajax-cart-form">
                                                    <!-- khi có sản phẩm -->
                                                    <tr class="item_2" data-id="1041431100">
                                                        <td class="img">
                                                            <a href="ao-freedom-1805-p846.html">
                                                                <!-- ảnh được cắt 470x570 -->
                                                                <img src="{{asset('images-demo/1590838844.jpg')}}" alt="Áo Freedom 1805">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <input name="quantity" value="" class="quantity ajax-quantity" type="hidden">
                                                            <a class="pro-title-view" href="#">Áo Freedom 1805</a>
                                                            <span class="pro-price-view">259.000₫</span>
                                                            <span class="pro-price-view">Số lượng: 1</span>
                                                            <div class="variant">
                                                                <span>Size : 34</span>
                                                                <span>Màu sắc : Da</span>
                                                            </div>
                                                            <div class="remove_link remove-cart delete_item"><a href="javascript:void(0);" class="quantity">Xóa</a></div>
                                                        </td>
                                                    </tr>
                                                    <!-- không có sản phẩm khi nào làm chức năng thì xóa đoạn code style đi chuyển thành đặt điều kiện -->
                                                    <tr class="notification" style="display: none;">
                                                        <td colspan="2" class="text-center">
                                                            Chưa có sản phẩm nào trong giỏ hàng
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <span class="line"></span>
                                            <table class="table-total">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left"><b>TỔNG TIỀN TẠM TÍNH:</b></td>
                                                        <td class="text-right" id="total-view-cart">259.000₫</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <a href="dat-mua.html" class="checkLimitCart linktocheckout button dark">Đặt hàng</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <a href="javascript:void(0);" class="linktocart button dark">Chọn thêm sản phẩm <i class="fa fa-arrow-right"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- menu mobile -->
        <div class="mobile-main-menu">
            <div class="la-scroll-fix-infor-user">
                <div class="la-nav-menu-items">
                    <ul class="la-nav-list-items ul-b">
                        <!-- khi có sub-menu (menu con ) thì thêm 1 class  menu-item-has-children -->
                        <li class="ng-scope ng-has-child1 menu-item-has-children">
                            <a href="#">Áo lót</a>
                            <ul class="sub-menu ul-b">
                                <li class="ng-scope ng-has-child2 menu-item-has-children">
                                    <a href="#">Áo lót đệm dày</a>
                                    <ul class="sub-menu ul-b">
                                        <li class="ng-scope ng-has-child2">
                                            <a href="#">Áo lót đệm dày</a>
                                        </li>
                                        <li class="ng-scope ng-has-child2">
                                            <a href="#">Áo lót đệm vừa</a>
                                        </li>
                                        <li class="ng-scope ng-has-child2">
                                            <a href="#">Áo lót đệm mỏng</a>
                                        </li>
                                        <li class="ng-scope ng-has-child2">
                                            <a href="#">Áo lót không gọng</a>
                                        </li>
                                        <li class="ng-scope ng-has-child2">
                                            <a href="#">Áo lót có gọng</a>
                                        </li>
                                        <li class="ng-scope ng-has-child2">
                                            <a href="#">Bralette</a>
                                        </li>
                                        <li class="ng-scope ng-has-child2">
                                            <a href="#">Áo lót tạo kiểu</a>
                                        </li>
                                        <li class="ng-scope ng-has-child2">
                                            <a href="#">Phụ kiện áo lót</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Áo lót đệm vừa</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Áo lót đệm mỏng</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Áo lót không gọng</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Áo lót có gọng</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Bralette</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Áo lót tạo kiểu</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Phụ kiện áo lót</a>
                                </li>
                            </ul>
                        </li>
                        <li class="ng-scope ng-has-child1 menu-item-has-children">
                            <a href="quan-lot.html">Quần Lót</a>
                            <ul class="sub-menu ul-b">
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Combo tiết kiệm</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Quần lót cotton</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Quần lót ren</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Quần lót không viền</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Quần lót thun lạnh</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Quần lót lọt khe</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Quần lót 3/4 mông</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Quần lót cả mông</a>
                                </li>
                            </ul>
                        </li>
                        <li class="ng-scope ng-has-child1 menu-item-has-children">
                            <a href="#">Set bras</a>
                            <ul class="sub-menu ul-b">
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Bộ đồ lót đệm dày</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Bộ đồ lót đệm vừa</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Bộ đồ lót đệm mỏng</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Bộ đồ lót sexy</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Bộ đồ lót ren</a>
                                </li>
                            </ul>
                        </li>
                        <li class="ng-scope ng-has-child1 menu-item-has-children">
                            <a href="#">Đồ ngủ</a>
                            <ul class="sub-menu ul-b">
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Váy ngủ sexy</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Pijama dài tay</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Pijama cộc tay</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Bộ ngủ 2 dây</a>
                                </li>
                                <li class="ng-scope ng-has-child2">
                                    <a href="#">Áo choàng ngủ</a>
                                </li>
                            </ul>
                        </li>
                        <li class="ng-scope ng-has-child1">
                            <a href="#">Blog </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> <!-- emd menu-main-mobile -->
    </header> <!-- end header -->
    <!-- Nội dung conter -->
    <main id="main-thanhtoan">
        <div class="container">
            <div class="wp-header-thanhtoan">
                <div class="wp-logo-fft">
                    <a href=""><img src="{{asset('images/logo.png')}}" alt="Venus Charm"></a>
                </div>
                <p><i class="fas fa-question-circle"></i><span> Thông tin khách hàng tuyệt đối bảo mật</span></p>
            </div>
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
                        <div class="box-ma-gg">
                            <div class="error uk-alert"></div>
                            <div class="magg">
                                <input type="text" name="discount_code" value="" class="text form-control" placeholder="Nhập mã giảm giá">
                                <input type="submit" class="btn btn-default button" value="Áp dụng" id="apply_gift_code">
                            </div>
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
                                <li>
                                    <span>Giảm giá</span>
                                    <div class="price_tt sp2" id="giftcode_value" data-price=""><input type="hidden" name="giftcode_value" value="0"><strong id="giftcode-uppercase">-</strong></div>
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
                        <h2 class="h2-title p-mon">Thông tin giao hàng</h2>
                        <div class="wp-form-tt">
                            <div class="form-group">
                                <input type="text" name="fullname" class="text form-control" placeholder="Ví dụ: Nguyễn Văn A" value="">
                            </div>
                            <div class="form-group group2">
                                <input type="text" name="email" class="text form-control input-to" placeholder="supportxyz@gmail.com" value="">
                                <input type="text" name="phone" class="text form-control input-nho" placeholder="Ví dụ: 0987654321" value="">
                            </div>
                            <div class="form-group">
                                <div class="col right"><input type="text" name="address" class="text form-control" placeholder="Ví dụ: Số 10, Ngõ 50, Đường ABC" value=""></div>
                            </div>
                            <div class="form-group group3">
                                <select name="cityid" class="form-control" id="cityid">
                                    <option value="0">--Tỉnh/Thành Phố--</option>
                                    <option value="24">Hà Nội</option>
                                    <option value="58">TP Hồ Chí Minh</option>
                                    <option value="63">Yên Bái</option>
                                    <option value="62">Vĩnh Phúc</option>
                                    <option value="61">Vĩnh Long</option>
                                    <option value="60">Tuyên Quang</option>
                                    <option value="59">Trà Vinh</option>
                                    <option value="57">Tiền Giang</option>
                                    <option value="56">Thừa Thiên - Huế</option>
                                    <option value="55">Thanh Hoá</option>
                                    <option value="54">Thái Nguyên</option>
                                </select>
                                <select name="districtid" class="form-control" id="districtid">
                                    <option value="0">--Quận/Huyện--</option>
                                </select>
                                <select name="wardid" class="form-control" id="wardid">
                                    <option value="0">--Phường/Xã--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="text form-control" placeholder="Ví dụ: Chuyển hàng ngoài giờ hành chính"></textarea>
                            </div>
                            <div class="wp-pt-thanhtoan" id="click_hidden" >
                                <p class="p-mon">Phí vận chuyển</p>
                                <div class="content-box  blank-slate">
                                    <i class="blank-slate-icon icon icon-closed-box "></i>
                                    <p>Vui lòng chọn tỉnh / thành để có danh sách phương thức vận chuyển.</p>
                                </div>
                            </div>
                            <div class="wp-pt-thanhtoan" id="wp-pt-thanhtoan" style="display: none;">
                                <p class="p-mon">Phí vận chuyển</p>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="shop" id="phi_shop" name="pt-tt" checked=""> Thanh toán khi nhận hàng (COD) <span id="phi_ship">33.000 đ</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="inner" id="phi_inner" name="pt-tt">Thanh toán chuyển khoản trước <span id="phi_vanchuyen">33.000 đ</span>
                                    </label>
                                </div>
                            </div>
                            <div class="phuongthuc-ttt" id="phuongthuc-ttt" style="display: none;" >
                                <p class="p-mon">Phương thức thanh toán</p>
                                <div class="wp-list-thanhtoan-a">
                                    <ul class="ul-b">
                                        <li id="offline">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" value="cod" id="cod-thanhtoan" name="pt-tt2" checked="" onclick="checkED()"> Thanh toán khi nhận hàng
                                                </label>
                                            </div>
                                        </li>
                                        <li id="hiddenshow">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" value="Chuyển khoản" id="online-thanhtoan" name="pt-tt2"> Chuyển khoản
                                                </label>

                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="btn-thanhtoan">
                                <a href="javascript:void(0);" onclick="goBack()"><i class="fas fa-arrow-left"></i>&nbsp;Tiếp tục mua hàng</a>
                                <button type="submit" name="create" value="create" class="uk-button btn btn-default" style="border: 0px">Hoàn tất đơn hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- chân trang -->
    <footer id="footer-site" style="display: none;">
        <div class="container-fluid pd-0">
            <div class="wp-footer-top">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="wp-ft-top">
                            <h3 class="h3-title-ft">GỌI MUA HÀNG <span>(09:00-22:00)</span> </h3>
                            <p class="p-phone">
                                <i class="fas fa-phone-alt"></i>
                                <a href="tel:0989935818"> <span>0989935818</span></a>
                            </p>
                            <p class="hidden-lg hidden-md p-time">( 9:00 - 22:00 )</p>
                            <p class="p-span">Tất cả các ngày trong tuần</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="wp-ft-top">
                            <h3 class="h3-title-ft">GÓP Ý, KHIẾU NẠI <span>(09:00-22:00)</span></h3>
                            <p class="p-phone">
                                <i class="fas fa-phone-alt"></i>
                                <span><a href="tel:0989097523">0989097523</a></span>
                            </p>
                            <p class="hidden-lg hidden-md p-time">( 9:00 - 22:00 )</p>
                            <p class="p-span">Tất cả các ngày trong tuần</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wp-ft-top ft-form-ft">
                            <h3 class="h3-title-ft">ĐĂNG KÝ NHẬN THÔNG TIN MỚI</h3>
                            <div class="wp-form-dk">
                                <form action="" id="sform" method="post">
                                    <div class="error alert" style="display: none;"></div>

                                    <div class="form-dk-email">
                                        <input type="email" placeholder="Email của bạn" class="form-control email" required="" name="email">
                                        <input type="hidden" value="ĐĂNG KÝ NHẬN THÔNG TIN MỚI" class="form-control title" name="title">
                                        <button class="btn btn-default btn-dk btn-hover">Đăng ký</button>
                                    </div>
                                    <div class="checkbox hidden-xs">
                                        <label>
                                            <input type="checkbox" class="check" value="" required=""> Tôi đồng ý với các điều kiện &amp; điều khoản
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wp-ft-top">
                            <h3 class="h3-title-ft">LIKE VENUS TRÊN MẠNG XÃ HỘI</h3>
                            <ul class="ul-b list-mxh">
                                <li><a href="" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="" target="_blank" class="fa-zalo"><img src="{{asset('images/logo-zalo-vector.png')}}" alt="Zalo"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!--  end -->
            <div class="wp-footer-main">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wp-ft-main">
                            <h3 class="h3-title-ft">HỆ THỐNG CỬA HÀNG</h3>
                            <ul class="ul-b list-ft-main" style="display: none;">
                                <li><a href="" title="Add 1: 11 Đội Cấn, Ba Đình, Hà Nội">Add 1: 11 Đội Cấn, Ba Đình, Hà Nội</a></li>
                                <li><a href="" title="Add 2: 209 Cầu Giấy, Cầu Giấy, Hà Nội">Add 2: 209 Cầu Giấy, Cầu Giấy, Hà Nội</a></li>
                                <li><a href="" title="Add 3: 31 Tây Sơn, Đống Đa, Hà Nội">Add 3: 31 Tây Sơn, Đống Đa, Hà Nội</a></li>
                                <li><a href="" title="Add 4: Số 01 Đại Cồ Việt, HBT, Hà Nội">Add 4: Số 01 Đại Cồ Việt, HBT, Hà Nội</a></li>
                                <li><a href="/" title="Add 5: 678 Nguyễn Trãi, Thanh Xuân, Hà Nội">Add 5: 678 Nguyễn Trãi, Thanh Xuân, Hà Nội</a></li>
                                <li><a href="/" title="Add 6: 112C1 Phạm Ngọc Thạch, Đống Đa, Hà Nội">Add 6: 112C1 Phạm Ngọc Thạch, Đống Đa, Hà Nội</a></li>
                                <li><a href="/" title="Add 7: A27 Shophouse Vincom, Lê Hoàn, Thanh Hoá">Add 7: A27 Shophouse Vincom, Lê Hoàn, Thanh Hoá</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wp-ft-main">
                            <h3 class="h3-title-ft">HỖ TRỢ KHÁCH HÀNG</h3>
                            <ul class="ul-b list-ft-main" style="display: none;">
                                <li><a href="" title="Chính sách đổi trả">Chính sách đổi trả</a></li>
                                <li><a href="" title="Chính sách bảo hành">Chính sách bảo hành</a></li>
                                <li><a href="" title="Chính sách thanh toán">Chính sách thanh toán</a></li>
                                <li><a href="chinh-sach-bao-mat.html" title="Chính sách bảo mật">Chính sách bảo mật</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wp-ft-main">
                            <h3 class="h3-title-ft">VỀ VENUS CHARM</h3>
                            <ul class="ul-b list-ft-main" style="display: none;">
                                <li><a href="gioi-thieu-venus-charm.html" title="Giới thiệu">Giới thiệu </a></li>
                                <li><a href="lien-he.html" title="Liên hệ">Liên hệ</a></li>
                                <li><a href="tuyen-dung-venus-charm.html" title="Tuyển dụng">Tuyển dụng</a></li>
                                <li><a href="javascript: void(0)" title="Tìm đại lý">Tìm đại lý</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wp-ft-main">
                            <h3 class="h3-title-ft">Fanpage của chúng tôi</h3>
                            <div class="ul-b list-ft-main" style="display: none;">
                                <div class="wp-iframe-fb">
                                    <iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/Venuscharm.com.vn/%2F&amp;tabs=timeline&amp;width=360&amp;height=200&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=1821093994887965" width="360" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true" allow="encrypted-media">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end -->
            <div class="wp-footer-bottom">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="left-ft-bt">
                        <span>© 2019 Venus</span>
                    </div>
                </div>
                <div class="col-md-6 hidden-sm hidden-xs">
                    <div class="right-ft-bt text-right">
                       
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>
     <div class="feedback">
        <a href="#" target="_blank"><div class="inner rotate">Feedback</div></a>
    </div>
</body>



<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.js')}}"></script>
<script src="{{asset('js/rangeslider.js')}}"></script>
<script src="{{asset('js/fontawesome.min.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('js/sticky-kit.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/customer.js')}}"></script>

<script>
    if($(window).width() > 768) {

        $(document).ready(function() {
            $('.wp-footer-main').click(function() {
                $('.list-ft-main').slideToggle("fast");
            });
        });
    }
</script>
</html>
