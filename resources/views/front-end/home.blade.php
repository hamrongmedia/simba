@extends('front-end.layout.main')

@section('title')
Trang chủ
@endsection

@section('content')
    <section class="sec-home-01 mb-80">
        <div class="container-fluid pd-0">
            <div class="row row-edit-0 row-banner-1">
                <div class="col-md-12 col-edit-0">
                    <div class="wp-banner">
                        <div class="img-banner">
                            <?php //dd($homepageOption);?>
                            <img class="sample2 el_image hidden-xs" src="{{isset($homepageOption->home1_background) ? $homepageOption->home1_background : '#'}}" alt="banner1">
                           <!--  banner mobile -->
                            <img class="sample2 el_image hidden-md hidden-lg hidden-sm" src="{{asset('images-demo/venus-charm-grand-opening-112c1-pham-ngoc-thach.png')}}" alt="banner1">
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
    @include('front-end.content.modal_size')

    <section class="sec-home-02 mb-80 hidden-xs">
        <div class="container-fluid pd-0">
            <div class="row">
                <div class="col-md-6 col-sm-6 hidden-xs col-edit-0">
                    <div class="wp-tin wp-tin2 flex-oder">
                        <div class="img-tin">
                            <a href="#" class="d-block w-100">
                                <img class="el_image" src="{{asset('images-demo/venus-charm-banner-cheo-2.jpg')}}" alt="Chiếc áo lót đang mặc <br>có làm nàng thoải mái?">
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
                                <img class="el_image" src="{{asset('images-demo/venus-charm-ao-quay.jpg')}}" alt="Êm - Mềm - Nhẹ <br>Venus Charm">
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
                <img class="el_image" src="{{asset('images-demo/venuscharm-banner-3.jpg')}}" alt="banner">
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
   <!--  ưu đãi -->
    <section class="sec-home-05 mb-50">
        <div class="container-fluid pd-0">
            <div class="wp-title-sec">
                <h2 class="h2-title up-case">Ưu đãi trong tuần</h2>
            </div>
            <div class="wp-list-uudai">
                 @include('front-end.content.uu_dai')
            </div>
        </div>
    </section> <!-- end sec-home-05 -->
    <!-- list sản phẩm -->
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
                      @include('front-end.content.product_list')
                  
                </div>
            </div>

           
        </div>
    </section> <!-- end sec-home-06 -->

    <section class="sec-home-07 hidden-xs hidden-sm">
        <div class="container-fluid">
            @include('front-end.content.list_term_product')
        </div>
    </section> <!-- end sec-home-07 -->

    <section class="sec-home-08 mb-20">
        <div class="container-fluid">
            <div class="wp-dichvu">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="wp-item-dv">
                            <div class="icon-dv">
                                <img class="el_image" src="{{asset('images-demo/venus-charm-feeship-don-hang-700k-full.png')}}" alt="FREESHIP ĐƠN HÀNG TỪ 03 SẢN PHẨM TRỞ LÊN">
                            </div>
                            <div class="text-dv">
                                <h2 class="h2-title">FREESHIP ĐƠN HÀNG TỪ 03 SẢN PHẨM TRỞ LÊN</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="wp-item-dv">
                            <div class="icon-dv">
                                <img class="el_image" src="{{asset('images-demo/bao-hanh-venus-charm-30-ngay-full.png')}}" alt="BẢO HÀNH SẢN PHẨM TRONG 30 NGÀY">
                            </div>
                            <div class="text-dv">
                                <h2 class="h2-title">BẢO HÀNH SẢN PHẨM TRONG 30 NGÀY</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="wp-item-dv">
                            <div class="icon-dv">
                                <img class="el_image" src="{{asset('images-demo/dam-bao-san-pham-nhu-hinh-full.png')}}" alt="ĐẢM BẢO SẢN PHẨM NHƯ HÌNH">
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
                      @include('front-end.content.product_list')
                  
                </div>
            </div>
        </div>
    </section> <!-- end sec-home-06 -->
    <section class="sec-home-10 hidden-xs hidden-sm ">
        <div class="container-fluid">
             @include('front-end.content.list_term_product')
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
                                    <img class="el_image" src="{{asset('images-demo/venus-charm-do-lot-mac-thoai-mai-tu-do(1).jpg')}}" alt="banner0">
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a data-toggle="modal" data-target="#myModalIn0">
                                    <img class="el_image" src="{{asset('images-demo/venus-charm-ao-lot-khong-gong-ha-noi(1).jpg')}}" alt="banner1">
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a data-toggle="modal" data-target="#myModalIn0">
                                    <img class="el_image" src="{{asset('images-demo/venus-charm-danh-gia-san-pham(1).jpg')}}" alt="banner2">
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a data-toggle="modal" data-target="#myModalIn0">
                                    <img class="el_image" src="{{asset('images-demo/venus-charm-do-lot-ren-mac-ao-co-sau(1).jpg')}}" alt="banner3">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 inst-2">
                        <a data-toggle="modal" data-target="#myModalIn0">
                            <img class="el_image" src="{{asset('images-demo/venus-charm-ao-lot-khong-gong-xuat-nhat(1).jpg')}}" alt="banner4">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs inst-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a data-toggle="modal" data-target="#myModalIn0">
                                    <img class="el_image" src="{{asset('images-demo/venus-charm-ao-lot-khong-gong-dem-vua(1).jpg')}}" alt="banner5">
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a data-toggle="modal" data-target="#myModalIn0">
                                    <img class="el_image" src="{{asset('images-demo/venus-charm-tu-do-la-tu-lo(1).jpg')}}" alt="banner6">
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a data-toggle="modal" data-target="#myModalIn0">
                                    <img class="el_image" src="{{asset('images-demo/hop-qua-tang-venus-charm(1).jpg')}}" alt="banner7">
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a data-toggle="modal" data-target="#myModalIn0">
                                    <img class="el_image" src="{{asset('images-demo/venus-charm-ao-lot-khong-gong-dem-day(2).jpg')}}" alt="banner8">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('front-end.content.modal_inatagram')
    </section> <!-- end sec-home-11 -->



@endsection

@section('custom-js')

@endsection