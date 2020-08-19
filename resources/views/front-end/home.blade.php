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
                            <img class="sample2 el_image hidden-xs" src="{{isset($homepageOption->home1_background) ? $homepageOption->home1_background : ''}}" alt="banner1">
                           <!--  banner mobile -->
                            <img class="sample2 el_image hidden-md hidden-lg hidden-sm" src="{{isset($homepageOption->home1_background) ? $homepageOption->home1_background : ''}}" alt="banner1">
                        </div>
                        <div class="text-banner">
                            <div style="z-index: 9; font-size: 50px;color: #c73550;" class="hidden">
                                <b>TỰ DO</b>
                                <p style="font-size: 25px">là khi</p>
                            </div>
                            <a class="btn btn-default btn-xem btn-hover" href="#" data-toggle="modal" data-target="#modal-size">ĐO SIZE</a>
                            <a href="#" class="btn btn-default btn-xem btn-hover" style="color: #fff;background: #333333">MUA NGAY</a>
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
                                <img class="el_image" src="{{isset($homepageOption->home2_background1) ? $homepageOption->home2_background1 : ''}}" alt="">
                            </a>
                        </div>
                        <div class="text-tin">
                            <h2 class="h2-title">{!!isset($homepageOption->home2_title1) ? $homepageOption->home2_title1 : ''!!}</h2>
                            <span><p>{!!isset($homepageOption->home2_desc1) ? $homepageOption->home2_desc1 : ''!!}<br></p></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 hidden-xs col-edit-0">
                    <div class="wp-tin wp-tin1">
                        <div class="img-tin">
                            <a href="" class="d-block w-100">
                                <img class="el_image" src="{{isset($homepageOption->home2_background2) ? $homepageOption->home2_background2 : ''}}" alt="">
                            </a>
                        </div>
                        <div class="text-tin">
                            <h2 class="h2-title">{!!isset($homepageOption->home2_title2) ? $homepageOption->home2_title2 : ''!!}</h2>
                            <span><p>{!!isset($homepageOption->home2_desc2) ? $homepageOption->home2_desc2 : ''!!}<br></p></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- end sec-home-02 -->
    <section class="sec-home-03">
        <div class="wp-shopnow hidden-xs">
            <div class="img-bg">
                <img class="el_image" src="{{isset($homepageOption->home3_background) ? $homepageOption->home3_background : ''}}" alt="">
            </div>
            <div class="text-home-03">
                {!!isset($homepageOption->home3_desc) ? $homepageOption->home3_desc : ''!!}
            </div>
        </div>
        <div class="wp-suport-1">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="wp-item-support">
                        {!!isset($homepageOption->home4_desc1) ? $homepageOption->home4_desc1 : ''!!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="wp-item-support">
                        {!!isset($homepageOption->home4_desc2) ? $homepageOption->home4_desc2 : ''!!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="wp-item-support">
                        {!!isset($homepageOption->home4_desc2) ? $homepageOption->home4_desc2 : ''!!}
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- end sec-home-03 -->
   <!--  ưu đãi -->
    <section class="sec-home-05 mb-50">

        <div class="wp-spnb-margin">
            <div class="container-fluid pd-0 ">
                <div class="wp-title-sec">
                    <h2 class="h2-title up-case">Ưu đãi trong tuần</h2>
                </div>
                <div class="wp-list-uudai">
                     @include('front-end.content.uu_dai')
                </div>
            </div>
        </div>
        
    </section> <!-- end sec-home-05 -->
    <!-- list sản phẩm -->
    <section class="sec-home-06">
        <div class="wp-spnb-margin">
            <div class="container-fluid">
                <div class="wp-title-sec-sp clearfix">
                    <h2 class="h2-title">
                        <a href="{{route('product.getProductByCat', $product_cat1->slug)}}">{{$product_cat1->name ?? ''}}</a>
                    </h2>
                    <!-- để danh mục sản phẩm con không vượt quá 10 -->
                    <ul class="ul-b list-link-title hidden-xs hidden-sm">
                        @if ($child_product_cat1)
                            @foreach($child_product_cat1 as $subcat)
                            <li class="item"><a href="{{route('product.getProductByCat', $subcat->slug)}}">{{$subcat->name}}</a></li>
                            @endforeach
                        @endif
                        
                    </ul>
                    <!-- trên mobile -->
                     <!-- để danh mục sản phẩm con không vượt quá 10 -->
                    <ul class="ul-b list-link-title slide-sp-title owl-carousel hidden-md hidden-lg">
                        @if ($child_product_cat1)
                            @foreach($child_product_cat1 as $subcat)
                            <li class="item"><a href="{{route('product.getProductByCat', $subcat->slug)}}">{{$subcat->name}}</a></li>
                            @endforeach
                        @endif
                        
                    </ul>
                </div>

                <div class="wp-list-sp-home">
                    <div class="row">
                        @foreach($single_product_cat1 as $product)
                            @include('front-end.content.product_list',['data'=>$product])
                        @endforeach   
                    </div>
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
                            <a href="{{isset($homepageOption->home5_cat_product) ? $homepageOption->home5_cat_product : ''}}"><img class="el_image" src="{{isset($homepageOption->home5_background) ? $homepageOption->home5_background : ''}}"></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="wp-sp-nb sp-nb2">
                            <div class="row">
                                @foreach( $hot_products as $product )
                                    @isset($product)
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="wp-item-spnb2">
                                            <a href="{{ route('product.detail',['slug'=>$product->slug]) }}"><img class="el_image" src="{{$product->thumbnail}}" alt="{{$product->name}}"></a>
                                        </div>
                                    </div>
                                    @endisset 
                                @endforeach
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
    </section> <!-- end sec-home-08 -->
    <section class="sec-home-06 mb-20">
        <div class="wp-spnb-margin">
            <div class="container-fluid">
                <div class="wp-title-sec-sp clearfix">
                    <h2 class="h2-title">
                        <a href="{{$product_cat2->slug ?? ''}}">{{$product_cat2->name ?? ''}}</a>
                    </h2>
                    <!-- để danh mục sản phẩm con không vượt quá 10 -->
                    <ul class="ul-b list-link-title hidden-xs hidden-sm">
                        @if ($child_product_cat2)
                            @foreach($child_product_cat2 as $subcat)
                            <li class="item"><a href="{{route('product.getProductByCat', $subcat->slug)}}">{{$subcat->name}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                    <!-- trên mobile -->
                     <!-- để danh mục sản phẩm con không vượt quá 10 -->
                    <ul class="ul-b list-link-title slide-sp-title owl-carousel hidden-md hidden-lg">
                        @if ($child_product_cat2)
                            @foreach($child_product_cat2 as $subcat)
                            <li class="item"><a href="{{route('product.getProductByCat', $subcat->slug)}}">{{$subcat->name}}</a></li>
                            @endforeach
                        @endif
                        
                    </ul>
                </div>
                <div class="wp-list-sp-home">
                    <div class="row">
                        @foreach($single_product_cat2 as $product)
                            @include('front-end.content.product_list',['data'=>$product])
                        @endforeach  
                      
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- end sec-home-06 -->
    <section class="sec-home-07 hidden-xs hidden-sm">
        <div class="container-fluid">
            <div class="wp-spnb-b">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="wp-sp-nb sp-nb2">
                            <div class="row">
                                @foreach( $hot_products1 as $product )
                                    @isset($product)
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="wp-item-spnb2">
                                            <a href="{{ route('product.detail',['slug'=>$product->slug]) }}"><img class="el_image" src="{{$product->thumbnail}}" alt="{{$product->name}}"></a>
                                        </div>
                                    </div>
                                    @endisset 
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="wp-sp-nb sp-nb1">
                           <!--  ảnh cắt 820x920 -->
                            <a href="{{isset($homepageOption->home10_cat_product) ? $homepageOption->home10_cat_product : ''}}"><img class="el_image" src="{{isset($homepageOption->home10_background) ? $homepageOption->home10_background : ''}}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- end sec-home-07 -->
    <section class="sec-home-11 ">
        <div class="container-fluid pd-0">
            <div class="sec-instagam">
                <div class="wp-title-sec">
                    <div class="title-instagram text-center">
                        <span><i class="fab fa-instagram" aria-hidden="true"></i></span>
                        <h2>SHOP OUR INSTAGRAM</h2>
                        <h4>#venuscharm</h4>
                    </div>
                </div>
                <div class="owl-carousel slider-instagram">
                    <div class="item">
                        <img class="el_image" src="{{asset('images-demo/venus-charm-do-lot-mac-thoai-mai-tu-do(1).jpg')}}" alt="banner0">
                        <a href="#" target="_blank">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                      <div class="item">
                        <img class="el_image" src="{{asset('images-demo/venus-charm-ao-lot-khong-gong-ha-noi(1).jpg')}}" alt="banner1">
                        <a href="#" target="_blank">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                     <div class="item">
                         <img class="el_image" src="{{asset('images-demo/venus-charm-danh-gia-san-pham(1).jpg')}}" alt="banner2">
                        <a href="#" target="_blank">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                     <div class="item">
                        <img class="el_image" src="{{asset('images-demo/venus-charm-do-lot-ren-mac-ao-co-sau(1).jpg')}}" alt="banner3">
                        <a href="#" target="_blank">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="item" >
                         <img class="el_image" src="{{asset('images-demo/venus-charm-ao-lot-khong-gong-dem-vua(1).jpg')}}" alt="banner5">
                        <a href="#" target="_blank">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="item">
                        <img class="el_image" src="{{asset('images-demo/venus-charm-tu-do-la-tu-lo(1).jpg')}}" alt="banner6">
                        <a href="#" target="_blank">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="item">
                        <img class="el_image" src="{{asset('images-demo/hop-qua-tang-venus-charm(1).jpg')}}" alt="banner7">
                        <a href="#" target="_blank">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="item">
                        <img class="el_image" src="{{asset('images-demo/venus-charm-ao-lot-khong-gong-dem-day(2).jpg')}}" alt="banner8">
                        <a href="#" target="_blank">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @include('front-end.content.modal_inatagram')
    </section> <!-- end sec-home-11 -->



@endsection

@section('custom-js')

@endsection