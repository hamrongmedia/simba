@extends('front-end.layout.main')

@section('title')
Trang chủ
@endsection

@section('content')
    <section class="sec-home-01 mb-80">
        <div class="container-fluid pd-0">
            <div class="row row-edit-0 row-banner-1">
                 <div class="col-md-12 col-edit-0">
                    <div class="wp-banner slider-home owl-carousel">
                        @if (isset($homepageOption->home1_background))
                            @php
                                $banners = $homepageOption->home1_background;
                                $banners = explode(',', $banners);
                            @endphp
                            @foreach ($banners as $banner_link)
                            <div class="img-banner">
                                <img class="sample2 el_image" src="{{$banner_link ?? ''}}" alt="banner">
                            </div>
                            @endforeach
                        @endif
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

    
<!-- api- instagram -->
@include('front-end.api.instagram')



@endsection

@section('custom-js')

@endsection