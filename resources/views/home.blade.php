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

    <title>Trang chủ</title>

    <!-- các thẻ meta -->

    <meta name="keywords" content="Venus Charm">
    <meta name="description" content="Venus Charm">
    <meta name="revisit-after" content="1 days">
    <meta name="rating" content="general">
    
    <!-- for Facebook -->
    <meta property="og:title" content="Venus Charm">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{asset('public/images-demo/venus-charm-banner-dau-trang-1-.jpg')}}">
    <meta property="og:description" content="Venus Charm">
    <meta property="og:site_name" content="Venus Charm">
    <meta property="fb:admins" content="">
    <meta property="fb:app_id" content="">

    <!-- for Twitter -->          
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Venus Charm">
    <meta name="twitter:description" content="Venus Charm">
    <meta name="twitter:image" content="{{asset('public/images-demo/venus-charm-banner-dau-trang-1-.jpg')}}">
    <link rel="shortcut icon" href="{{asset('public/images/logo.png')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- thư viện css -->
    <link rel="stylesheet"  href="{{asset('public/css/fontawesome.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('public/css/all.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('public/css/jquery.fancybox.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('public/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('public/css/owl.carousel.css')}}"/>
    <!-- code css -->
    <link rel="stylesheet"  href="{{asset('public/css/style.css')}}"/>
</head>
<!-- yêu cầu người code chức năng để ý kỹ code html của các trang copy thiếu hay tự làm lỗi thì tự chỉnh 
     thêm class ( page-child ) ở các trang chừ trang chủ 

 -->
<body>
    <header id="header-site">
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
                                                        <img class="img-responsive" src="{{asset('public/images/logo.png')}}" alt="">
                                                    </a>
                                                </h1>
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
                                            <img src="{{asset('public/images/clo.png')}}" alt="Đóng">
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
                                                                <img src="{{asset('public/images-demo/1590838844.jpg')}}" alt="Áo Freedom 1805">
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
                                                <tbody><tr>
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
                                            </tbody></table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header> <!-- end header -->
    <!-- Nội dung conter -->
    <main id="main-site">
        <section class="sec-home-01 mb-80">
            <div class="container-fluid pd-0">
                <div class="row row-edit-0 row-banner-1">
                    <div class="col-md-12 col-edit-0">
                        <div class="wp-banner">
                            <div class="img-banner">
                                <img class="sample2 el_image hidden-xs" src="{{asset('public/images-demo/pc-venus-charm-grand-opening-112c1-pham-ngoc-thach.png.png')}}" alt="banner1">
                               <!--  banner mobile -->
                                <img class="sample2 el_image hidden-md hidden-lg hidden-sm" src="{{asset('public/images-demo/venus-charm-grand-opening-112c1-pham-ngoc-thach.png')}}" alt="banner1">
                            </div>
                            <div class="text-banner">
                                <div style="z-index: 9; font-size: 50px;color: #c73550;" class="hidden">
                                    <b>TỰ DO</b>
                                    <p style="font-size: 25px">là khi</p>
                                </div>
                                <a class="btn btn-default btn-xem btn-hover" href="#" data-toggle="modal" data-target="#modal-size">ĐO SIZE</a>
                                <a href="https://venuscharm.vn/ao-lot.html" class="btn btn-default btn-xem btn-hover" style="color: #fff;background: #333333">MUA NGAY</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- end banner -->
        <!-- modal-size -->
        <div class="modal fade in" id="modal-size">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close closedong" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="wp-img-size" id="wp-img-sizeqq">
                                    <img src="{{asset('public/images-demo/dosize-1-.png')}}" alt="ảnh hướng dẫn ">
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="wp-list-form-dosize " >
                                    <div class="wp-text-size form-1">
                                        <p></p>
                                        <h6 style="">Ở Việt Nam, cứ 5 phụ nữ thì có 1 người mặc sai cỡ áo ngực<p></p>
                                            <div class="wp-list-ranger" style="">
                                                <div class="rangeslider-group1" style="">
                                                    <label for="panel_size">Chiều cao (cm)</label>
                                                    <input type="range" name="participants" min="145" max="180" value="" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;">
                                                    <input id="value_chieucao" type="hidden" value="163" name="value_chieucao">
                                                </div>
                                                <div class="rangeslider-group2" style="">
                                                    <label for="panel_size">Cân nặng (kg)</label>
                                                    <input type="range" name="participants2" min="40" max="75" value="" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;">
                                                    
                                                    <input id="value_cannang" type="hidden" value="" name="value_cannang">

                                                </div>
                                                <div class="rangeslider-group3" style="">
                                                    <label for="panel_size">Vòng 01 (cm)</label>
                                                    <input type="range" name="participants3" min="70" max="100" value="" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;">
                                                    
                                                    <input id="value_vong1" type="hidden" value="83" name="value_vong1">
                                                </div>
                                            </div>
                                            <div class="btn-dosive">
                                                <a href="javascript:void();" class="btn btn-default btn-click-dosize">Đo size</a>
                                            </div>
                                        </h6>
                                    </div>
                                    <div class="wp-text-size form-2 " id="form-view-2" style="display: none;">
                                        <div class="wp-left-dexuat">
                                            <h4 class="h4-title text-center">Size của bạn</h4>
                                            <p>Đề xuất của bạn là:</p>
                                            <div class="int-size">
                                                <span>36</span>
                                            </div>
                                            <p>85% khách hàng có chiều cao, cân nặng, số đo vòng 1 giống bạn đã mua và mặc vừa sản phẩm size 36.</p>
                                            <p><a class="btn-chinhsua-lai">Chỉnh sửa số đo</a></p>
                                        </div>
                                        <div class="wp-btn-form2-a">
                                            <a style="font-size: 14px;height: 42px;line-height: 42px;padding: 0px 20px" href="" class="btn btn-default btn-hover">Shop by size</a>
                                            <a data-dismiss="modal" class="btn btn-default closedong close" style="font-size: 14px;height: 42px;line-height: 42px;margin: 0px;padding: 0px 20px;opacity: 1;font-weight: normal;">Mua ngay</a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end modal-size -->
        <section class="sec-home-02 mb-80 hidden-xs">
            <div class="container-fluid pd-0">
                <div class="row">
                    <div class="col-md-6 col-sm-6 hidden-xs col-edit-0">
                        <div class="wp-tin wp-tin2 flex-oder">
                            <div class="img-tin">
                                <a href="#" class="d-block w-100">
                                    <img class="el_image" src="{{asset('public/images-demo/venus-charm-banner-cheo-2.jpg')}}" alt="Chiếc áo lót đang mặc <br>có làm nàng thoải mái?">
                                </a>
                            </div>
                            <div class="text-tin">
                                <h2 class="h2-title">Chiếc áo lót đang mặc <br>có làm nàng thoải mái?</h2>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 hidden-xs col-edit-0">
                        <div class="wp-tin wp-tin1">
                            <div class="img-tin">
                                <a href="" class="d-block w-100">
                                    <img class="el_image" src="{{asset('public/images-demo/venus-charm-ao-quay.jpg')}}" alt="Êm - Mềm - Nhẹ <br>Venus Charm">
                                </a>
                            </div>
                            <div class="text-tin">
                                <h2 class="h2-title">Êm - Mềm - Nhẹ <br>Venus Charm
                                </h2>
                                <span><p>Giúp nàng luôn đẹp mà không cần cố gắng<br></p></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- end sec-home-02 -->
        <section class="sec-home-03">
            <div class="wp-shopnow hidden-xs">
                <div class="img-bg">
                    <img class="el_image" src="{{asset('public/images-demo/venuscharm-banner-3.jpg')}}" alt="banner">
                </div>
                <div class="text-home-03">
                    <h2 class="h2-title"><br><br>KHÔNG GỌNG <br></h2>
                    <h3>XU HƯỚNG NỘI Y THẾ HỆ MỚI <br> <br></h3>
                    <a href="#" target="_blank" class="btn btn-default btn-shopnow btn-hover">shop now</a>
                </div>
            </div>
            <div class="wp-suport-1">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="wp-item-support">
                            <h3 class="h3-title">Hỗ trợ đổi trả <br> khi không vừa size</h3>

                            <div class="wp-btn-xemct">
                                <a href="javascript: void(0)" class="btn btn-default btn-xem-ct btn-hover">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="wp-item-support">
                            <h3 class="h3-title">Bảo hành sản phẩm trong vòng 30 ngày</h3>

                            <div class="wp-btn-xemct">
                                <a href="javascript: void(0)" class="btn btn-default btn-xem-ct btn-hover">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="wp-item-support">
                            <h3 class="h3-title">Cam kết <br> sản phẩm như hình</h3>

                            <div class="wp-btn-xemct">
                                <a href="javascript: void(0)" class="btn btn-default btn-xem-ct btn-hover">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- end sec-home-03 -->

        <section class="sec-home-05 mb-50">
            <div class="container-fluid pd-0">
                <div class="wp-title-sec">
                    <h2 class="h2-title up-case">Ưu đãi trong tuần</h2>
                </div>
                <div class="wp-list-uudai">
                    <div class="slide-uudai owl-carousel">
                        <div class="item">
                            <div class="wp-item-uudai">
                                <div class="img-uudai">
                                    <a href="/">
                                        <img class="el_image" src="{{asset('public/images-demo/venuscharm-dolot-freeship-1-.png')}}" alt="FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN">
                                    </a>
                                </div>
                                <div class="text-uudai text-center hidden-xs">
                                    <h3 class="h3-title" style="font-size: 15px">FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN</h3>

                                    <div class="wp-shopnow">
                                        <a href="/" class="btn btn-default btn-now btn-hover" style="border: 0px">Xem
                                        thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="wp-item-uudai">
                                <div class="img-uudai">
                                    <a href="/">
                                        <img class="el_image" src="{{asset('public/images-demo/banner-freeship-venus-charm-1-.jpg')}}" alt="FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN">
                                    </a>
                                </div>
                                <div class="text-uudai text-center hidden-xs">
                                    <h3 class="h3-title" style="font-size: 15px">FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN</h3>

                                    <div class="wp-shopnow">
                                        <a href="/" class="btn btn-default btn-now btn-hover" style="border: 0px">Xem
                                        thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="wp-item-uudai">
                                <div class="img-uudai">
                                    <a href="/">
                                        <img class="el_image" src="{{asset('public/images-demo/venuscharm-dolot-freeship-1-.png')}}" alt="FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN">
                                    </a>
                                </div>
                                <div class="text-uudai text-center hidden-xs">
                                    <h3 class="h3-title" style="font-size: 15px">FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN</h3>

                                    <div class="wp-shopnow">
                                        <a href="/" class="btn btn-default btn-now btn-hover" style="border: 0px">Xem
                                        thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="wp-item-uudai">
                                <div class="img-uudai">
                                    <a href="/">
                                        <img class="el_image" src="{{asset('public/images-demo/banner-freeship-venus-charm-1-.jpg')}}" alt="FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN">
                                    </a>
                                </div>
                                <div class="text-uudai text-center hidden-xs">
                                    <h3 class="h3-title" style="font-size: 15px">FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN</h3>

                                    <div class="wp-shopnow">
                                        <a href="/" class="btn btn-default btn-now btn-hover" style="border: 0px">Xem
                                        thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="wp-item-uudai">
                                <div class="img-uudai">
                                    <a href="/">
                                        <img class="el_image" src="{{asset('public/images-demo/venuscharm-dolot-freeship-1-.png')}}" alt="FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN">
                                    </a>
                                </div>
                                <div class="text-uudai text-center hidden-xs">
                                    <h3 class="h3-title" style="font-size: 15px">FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN</h3>

                                    <div class="wp-shopnow">
                                        <a href="/" class="btn btn-default btn-now btn-hover" style="border: 0px">Xem
                                        thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="wp-item-uudai">
                                <div class="img-uudai">
                                    <a href="/">
                                        <img class="el_image" src="{{asset('public/images-demo/banner-freeship-venus-charm-1-.jpg')}}" alt="FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN">
                                    </a>
                                </div>
                                <div class="text-uudai text-center hidden-xs">
                                    <h3 class="h3-title" style="font-size: 15px">FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN</h3>

                                    <div class="wp-shopnow">
                                        <a href="/" class="btn btn-default btn-now btn-hover" style="border: 0px">Xem
                                        thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="wp-item-uudai">
                                <div class="img-uudai">
                                    <a href="/">
                                        <img class="el_image" src="{{asset('public/images-demo/venuscharm-dolot-freeship-1-.png')}}" alt="FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN">
                                    </a>
                                </div>
                                <div class="text-uudai text-center hidden-xs">
                                    <h3 class="h3-title" style="font-size: 15px">FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN</h3>

                                    <div class="wp-shopnow">
                                        <a href="/" class="btn btn-default btn-now btn-hover" style="border: 0px">Xem
                                        thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="wp-item-uudai">
                                <div class="img-uudai">
                                    <a href="/">
                                        <img class="el_image" src="{{asset('public/images-demo/banner-freeship-venus-charm-1-.jpg')}}" alt="FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN">
                                    </a>
                                </div>
                                <div class="text-uudai text-center hidden-xs">
                                    <h3 class="h3-title" style="font-size: 15px">FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN</h3>

                                    <div class="wp-shopnow">
                                        <a href="/" class="btn btn-default btn-now btn-hover" style="border: 0px">Xem
                                        thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="item">
                            <div class="wp-item-uudai">
                                <div class="img-uudai">
                                    <a href="/">
                                        <img class="el_image" src="{{asset('public/images-demo/venuscharm-dolot-freeship-1-.png')}}" alt="FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN">
                                    </a>
                                </div>
                                <div class="text-uudai text-center hidden-xs">
                                    <h3 class="h3-title" style="font-size: 15px">FREESHIP ĐƠN HÀNG TỪ 3 SP TRỞ LÊN</h3>

                                    <div class="wp-shopnow">
                                        <a href="/" class="btn btn-default btn-now btn-hover" style="border: 0px">Xem
                                        thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- end sec-home-05 -->
        <section class="sec-home-06">
            <div class="container-fluid">
                <div class="wp-title-sec-sp clearfix">
                    <h2 class="h2-title">
                        <a href="ao-lot.html">ÁO LÓT</a>
                    </h2>
                    <!-- để danh mục sản phẩm con không vượt quá 10 -->
                    <ul class="ul-b list-link-title hidden-xs hidden-sm">
                        <li class="item"><a href="">ÁO LÓT TẠO KIỂU</a></li>
                        <li class="item"><a href="">ĐỆM DÀY</a></li>
                        <li class="item"><a href="">ĐỆM VỪA</a></li>
                        <li class="item"><a href="">ĐỆM MỎNG</a></li>
                        <li class="item"><a href="">KHÔNG GỌNG</a></li>
                    </ul>
                    <!-- trên mobile -->
                     <!-- để danh mục sản phẩm con không vượt quá 10 -->
                    <ul class="ul-b list-link-title slide-sp-title owl-carousel hidden-md hidden-lg">
                        <li class="item"><a href="">ÁO LÓT TẠO KIỂU</a></li>
                        <li class="item"><a href="">ĐỆM DÀY</a></li>
                        <li class="item"><a href="">ĐỆM VỪA</a></li>
                        <li class="item"><a href="">ĐỆM MỎNG</a></li>
                        <li class="item"><a href="">KHÔNG GỌNG</a></li>
                    </ul>
                </div>
                <div class="wp-list-sp-home">
                    <div class="row">
                      <!--   bắt bầu vòng lặp sản phẩm -->
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="wp-item-sp">
                                <!--màu sắc -->
                                <div style="position: relative">
                                    <div class="wp-list-sp-slide">
                                        <div class="wp-item-sp-main active">
                                            <div class="slide-sp owl-carousel">
                                                <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1590839584.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1590839580.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end slider 1 -->
                                        <div class="wp-item-sp-main">
                                            <div class="slide-sp owl-carousel">
                                                <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1590839561.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                 <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1590839561.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end slider 2 -->
                                    </div>
                                    <div class="wp-add-to-cart">
                                        <a href="">
                                            <span>Thêm vào giỏ</span>
                                            <i class="fas fa-shopping-bag"></i>
                                        </a>
                                    </div>
                                </div>
                                <!--end màu sắc-->
                                <div class="wp-name-sp">
                                    <h3 class="h3-title">
                                        <a href="">Áo 6883 Cao Cấp</a>
                                    </h3>
                                </div>
                                <div class="wp-price-sp">
                                    <span class="int">450.000đ</span>
                                </div>
                                <!--màu sắc đầu tiên-->
                                <div class="wp-list-check-color">
                                    <ul class="ul-b list-color-sp">
                                        <li class="item-color color-1 active">
                                            <span style="background: url('{{asset('public/images-demo/1590839575.jpg')}}')"></span>
                                        </li>
                                        <li class="item-color color-1">
                                            <span style="background: url('{{asset('public/images-demo/1590839542.jpg')}}')"></span>
                                        </li>
                                    </ul>
                                </div>
                                <!--end màu sắc đầu tiên-->
                            </div>
                        </div> <!-- end 1 sản phẩm -->
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="wp-item-sp">
                                <!--màu sắc -->
                                <div style="position: relative">
                                    <div class="wp-list-sp-slide">
                                        <div class="wp-item-sp-main active">
                                            <div class="slide-sp owl-carousel">
                                                <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1590839584.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1590839580.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end slider 1 -->
                                        <div class="wp-item-sp-main">
                                            <div class="slide-sp owl-carousel">
                                                <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1590839561.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                 <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1590839561.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end slider 2 -->
                                    </div>
                                    <div class="wp-add-to-cart">
                                        <a href="">
                                            <span>Thêm vào giỏ</span>
                                            <i class="fas fa-shopping-bag"></i>
                                        </a>
                                    </div>
                                </div>
                                <!--end màu sắc-->
                                <div class="wp-name-sp">
                                    <h3 class="h3-title">
                                        <a href="">Áo 6883 Cao Cấp</a>
                                    </h3>
                                </div>
                                <div class="wp-price-sp">
                                    <span class="int">450.000đ</span>
                                </div>
                                <!--màu sắc đầu tiên-->
                                <div class="wp-list-check-color">
                                    <ul class="ul-b list-color-sp">
                                        <li class="item-color color-1 active">
                                            <span style="background: url('{{asset('public/images-demo/1590839575.jpg')}}')"></span>
                                        </li>
                                        <li class="item-color color-1">
                                            <span style="background: url('{{asset('public/images-demo/1590839542.jpg')}}')"></span>
                                        </li>
                                    </ul>
                                </div>
                                <!--end màu sắc đầu tiên-->
                            </div>
                        </div> <!-- end 1 sản phẩm -->
                    </div>
                </div>
            </div>
        </section> <!-- end sec-home-06 -->

        <section class="sec-home-07 hidden-xs hidden-sm">
            <div class="container-fluid">
                <div class="wp-spnb-b">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="wp-sp-nb sp-nb1">
                               <!--  ảnh cắt 820x920 -->
                                <a href="ao-lot.html"><img class="el_image" src="{{asset('public/images-demo/venus-charm-banner-ao-lot-noi-bat-1-.jpg')}}" alt="ÁO LÓT"></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="wp-sp-nb sp-nb2">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="wp-item-spnb2">
                                           <!--  anh cắt 468x586 -->
                                            <a href=""><img class="el_image" src="{{asset('public/images-demo/1589008493.jpg')}}" alt="Áo Bầu 2195"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="wp-item-spnb2">
                                            <!--  anh cắt 468x586 -->
                                            <a href=""><img class="el_image" src="{{asset('public/images-demo/1588986851.jpg')}}" alt="Áo 8038"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="wp-item-spnb2">
                                            <!--  anh cắt 468x586 -->
                                            <a href=""><img class="el_image" src="{{asset('public/images-demo/1582979383.jpg')}}" alt="Áo JM Siêu Đẩy"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="wp-item-spnb2">
                                            <!--  anh cắt 468x586 -->
                                            <a href=""><img class="el_image" src="{{asset('public/images-demo/1578627910.jpg')}}" alt="ÁO LÓT 8055"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- end sec-home-07 -->
        <section class="sec-home-08 mb-20">
            <div class="container-fluid">
                <div class="wp-dichvu">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="wp-item-dv">
                                <div class="icon-dv">
                                    <img class="el_image" src="{{asset('public/images-demo/venus-charm-feeship-don-hang-700k-full.png')}}" alt="FREESHIP ĐƠN HÀNG TỪ 03 SẢN PHẨM TRỞ LÊN">
                                </div>
                                <div class="text-dv">
                                    <h2 class="h2-title">FREESHIP ĐƠN HÀNG TỪ 03 SẢN PHẨM TRỞ LÊN</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="wp-item-dv">
                                <div class="icon-dv">
                                    <img class="el_image" src="{{asset('public/images-demo/bao-hanh-venus-charm-30-ngay-full.png')}}" alt="BẢO HÀNH SẢN PHẨM TRONG 30 NGÀY">
                                </div>
                                <div class="text-dv">
                                    <h2 class="h2-title">BẢO HÀNH SẢN PHẨM TRONG 30 NGÀY</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="wp-item-dv">
                                <div class="icon-dv">
                                    <img class="el_image" src="{{asset('public/images-demo/dam-bao-san-pham-nhu-hinh-full.png')}}" alt="ĐẢM BẢO SẢN PHẨM NHƯ HÌNH">
                                </div>
                                <div class="text-dv">
                                    <h2 class="h2-title">ĐẢM BẢO SẢN PHẨM NHƯ HÌNH</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- end sec-home-08 -->
        <section class="sec-home-06 mb-20">
            <div class="container-fluid">
                <div class="wp-title-sec-sp clearfix">
                    <h2 class="h2-title">
                        <a href="ao-lot.html">QUẦN LÓT</a>
                    </h2>
                    <!-- để danh mục sản phẩm con không vượt quá 10 -->
                    <ul class="ul-b list-link-title hidden-xs hidden-sm">
                        <li class="item"><a href="">ÁO LÓT TẠO KIỂU</a></li>
                        <li class="item"><a href="">ĐỆM DÀY</a></li>
                        <li class="item"><a href="">ĐỆM VỪA</a></li>
                        <li class="item"><a href="">ĐỆM MỎNG</a></li>
                        <li class="item"><a href="">KHÔNG GỌNG</a></li>
                    </ul>
                    <!-- trên mobile -->
                     <!-- để danh mục sản phẩm con không vượt quá 10 -->
                    <ul class="ul-b list-link-title slide-sp-title owl-carousel hidden-md hidden-lg">
                        <li class="item"><a href="">ÁO LÓT TẠO KIỂU</a></li>
                        <li class="item"><a href="">ĐỆM DÀY</a></li>
                        <li class="item"><a href="">ĐỆM VỪA</a></li>
                        <li class="item"><a href="">ĐỆM MỎNG</a></li>
                        <li class="item"><a href="">KHÔNG GỌNG</a></li>
                    </ul>
                </div>
                <div class="wp-list-sp-home">
                    <div class="row">
                      <!--   bắt bầu vòng lặp sản phẩm -->
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="wp-item-sp">
                                <!--màu sắc -->
                                <div style="position: relative">
                                    <div class="wp-list-sp-slide">
                                        <div class="wp-item-sp-main active">
                                            <div class="slide-sp owl-carousel">
                                                <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1589760847.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1589760841.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end slider 1 -->
                                        <div class="wp-item-sp-main">
                                            <div class="slide-sp owl-carousel">
                                                <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1589760889.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                 <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1589760896.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end slider 2 -->
                                    </div>
                                    <div class="wp-add-to-cart">
                                        <a href="">
                                            <span>Thêm vào giỏ</span>
                                            <i class="fas fa-shopping-bag"></i>
                                        </a>
                                    </div>
                                </div>
                                <!--end màu sắc-->
                                <div class="wp-name-sp">
                                    <h3 class="h3-title">
                                        <a href="">Áo 6883 Cao Cấp</a>
                                    </h3>
                                </div>
                                <div class="wp-price-sp">
                                    <span class="int">450.000đ</span>
                                </div>
                                <!--màu sắc đầu tiên-->
                                <div class="wp-list-check-color">
                                    <ul class="ul-b list-color-sp">
                                        <li class="item-color color-1 active">
                                            <span style="background: url('{{asset('public/images-demo/1589760834.jpg')}}')"></span>
                                        </li>
                                        <li class="item-color color-1">
                                            <span style="background: url('{{asset('public/images-demo/1589760841.jpg')}}')"></span>
                                        </li>
                                    </ul>
                                </div>
                                <!--end màu sắc đầu tiên-->
                            </div>
                        </div> <!-- end 1 sản phẩm -->
                         <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="wp-item-sp">
                                <!--màu sắc -->
                                <div style="position: relative">
                                    <div class="wp-list-sp-slide">
                                        <div class="wp-item-sp-main active">
                                            <div class="slide-sp owl-carousel">
                                                <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1589760847.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1589760841.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end slider 1 -->
                                        <div class="wp-item-sp-main">
                                            <div class="slide-sp owl-carousel">
                                                <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1589760889.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                 <div class="item">
                                                    <div class="wp-img-slide-sp">
                                                        <a href="ao-6883-cao-cap-p847.html">
                                                            <img class="el_image" src="{{asset('public/images-demo/1589760896.jpg')}}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end slider 2 -->
                                    </div>
                                    <div class="wp-add-to-cart">
                                        <a href="">
                                            <span>Thêm vào giỏ</span>
                                            <i class="fas fa-shopping-bag"></i>
                                        </a>
                                    </div>
                                </div>
                                <!--end màu sắc-->
                                <div class="wp-name-sp">
                                    <h3 class="h3-title">
                                        <a href="">Áo 6883 Cao Cấp</a>
                                    </h3>
                                </div>
                                <div class="wp-price-sp">
                                    <span class="int">450.000đ</span>
                                </div>
                                <!--màu sắc đầu tiên-->
                                <div class="wp-list-check-color">
                                    <ul class="ul-b list-color-sp">
                                        <li class="item-color color-1 active">
                                            <span style="background: url('{{asset('public/images-demo/1589760834.jpg')}}')"></span>
                                        </li>
                                        <li class="item-color color-1">
                                            <span style="background: url('{{asset('public/images-demo/1589760841.jpg')}}')"></span>
                                        </li>
                                    </ul>
                                </div>
                                <!--end màu sắc đầu tiên-->
                            </div>
                        </div> <!-- end 1 sản phẩm -->
                        
                    </div>
                </div>
            </div>
        </section> <!-- end sec-home-06 -->
        <section class="sec-home-10 hidden-xs hidden-sm">
            <div class="container-fluid">
                <div class="wp-spnb-b">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="wp-sp-nb sp-nb2">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="wp-item-spnb2">
                                           <!--  anh cắt 468x586 -->
                                            <a href=""><img class="el_image" src="{{asset('public/images-demo/1581339280.jpg')}}" alt="Áo Bầu 2195"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="wp-item-spnb2">
                                            <!--  anh cắt 468x586 -->
                                            <a href=""><img class="el_image" src="{{asset('public/images-demo/1569862821.jpg')}}" alt="Áo 8038"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="wp-item-spnb2">
                                            <!--  anh cắt 468x586 -->
                                            <a href=""><img class="el_image" src="{{asset('public/images-demo/1584530705.jpg')}}" alt="Áo JM Siêu Đẩy"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="wp-item-spnb2">
                                            <!--  anh cắt 468x586 -->
                                            <a href=""><img class="el_image" src="{{asset('public/images-demo/1589013028.jpg')}}" alt="ÁO LÓT 8055"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="wp-sp-nb sp-nb1">
                               <!--  ảnh cắt 820x920 -->
                                <a href="ao-lot.html"><img class="el_image" src="{{asset('public/images-demo/venus-charm-banner-ao-lot-noi-bat2-2-1-.jpg')}}" alt="ÁO LÓT"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- end sec-home-07 -->
        <section class="sec-home-11 mb-80 hidden-xs">
            <div class="container-fluid pd-0">
                <div class="sec-instagam">
                    <div class="wp-title-sec">
                        <div class="title-instagram text-center">
                            <span><i class="fab fa-instagram" aria-hidden="true"></i></span>
                            <h2>SHOP OUR INSTAGRAM</h2>
                            <h4>#venuscharm</h4>
                        </div>
                    </div>
                    <div class="row img-instagram">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 inst-1">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <a data-toggle="modal" data-target="#myModalIn0">
                                        <img class="el_image" src="{{asset('public/images-demo/venus-charm-do-lot-mac-thoai-mai-tu-do(1).jpg')}}" alt="banner0">
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <a data-toggle="modal" data-target="#myModalIn0">
                                        <img class="el_image" src="{{asset('public/images-demo/venus-charm-ao-lot-khong-gong-ha-noi(1).jpg')}}" alt="banner1">
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <a data-toggle="modal" data-target="#myModalIn0">
                                        <img class="el_image" src="{{asset('public/images-demo/venus-charm-danh-gia-san-pham(1).jpg')}}" alt="banner2">
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <a data-toggle="modal" data-target="#myModalIn0">
                                        <img class="el_image" src="{{asset('public/images-demo/venus-charm-do-lot-ren-mac-ao-co-sau(1).jpg')}}" alt="banner3">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 inst-2">
                            <a data-toggle="modal" data-target="#myModalIn0">
                                <img class="el_image" src="{{asset('public/images-demo/venus-charm-ao-lot-khong-gong-xuat-nhat(1).jpg')}}" alt="banner4">
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs inst-3">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <a data-toggle="modal" data-target="#myModalIn0">
                                        <img class="el_image" src="{{asset('public/images-demo/venus-charm-ao-lot-khong-gong-dem-vua(1).jpg')}}" alt="banner5">
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <a data-toggle="modal" data-target="#myModalIn0">
                                        <img class="el_image" src="{{asset('public/images-demo/venus-charm-tu-do-la-tu-lo(1).jpg')}}" alt="banner6">
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <a data-toggle="modal" data-target="#myModalIn0">
                                        <img class="el_image" src="{{asset('public/images-demo/hop-qua-tang-venus-charm(1).jpg')}}" alt="banner7">
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <a data-toggle="modal" data-target="#myModalIn0">
                                        <img class="el_image" src="{{asset('public/images-demo/venus-charm-ao-lot-khong-gong-dem-day(2).jpg')}}" alt="banner8">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- end sec-home-11 -->
        <!-- modal INSTAGRAM -->
        <div class="modal fade myModalIn" id="myModalIn0" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="border-radius: 0px; border: 0px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body" style="padding: 0px">
                        <div class="row">
                            <div class="col-md-7 col-xs-12 col-sm-6">
                                <img class="showcase-media" src="{{asset('public/images-demo/venus-charm-danh-gia-san-pham(1).jpg')}}">
                            </div>
                            <div class="col-md-5 col-xs-12 col-sm-6">
                                <div style="padding: 50px 10px 10px 0px">
                                    <p></p>
                                    <p>Nàng nên nhớ, cuộc đời này là của nàng, sống hãy yêu chính mình trước, độc lập và tự chủ. Lúc ấy, nàng mới có thể tự do quyết đinh, tự do làm điều mình thích, yêu người mình thương, sống bản lĩnh và tích cực.</p>
                                    <div>
                                        <p>Phụ nữ hiện đại mà, muốn gì chả được, huống chi là tự do, tận hưởng cuộc sống!<br><br>____<br><br>Venus Charm - Beautiful Inside!</p>
                                    </div><br><p></p>
                                </div>
                                <div class="issss">
                                    <a href="https://www.instagram.com//" target="_blank">Follow Venus Charm // Instagram</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main><!--  end -->

    <!-- chân trang -->
    <footer id="footer-site">
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
                                <li><a href="" target="_blank" class="fa-zalo"><img src="{{asset('public/images/logo-zalo-vector.png')}}" alt="Zalo"></a></li>
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



<script src="{{asset('public/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/js/owl.carousel.js')}}"></script>
<script src="{{asset('public/js/rangeslider.js')}}"></script>
<script src="{{asset('public/js/fontawesome.min.js')}}"></script>
<script src="{{asset('public/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('public/js/sticky-kit.min.js')}}"></script>
<script src="{{asset('public/js/slick.min.js')}}"></script>
<script src="{{asset('public/js/customer.js')}}"></script>

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
