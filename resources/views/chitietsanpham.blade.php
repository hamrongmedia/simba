@extends('front-end.main.page_main')

@section('title')
Chi tiết sản phẩm
@endsection

@section('content')
    <section class="sec-main-page">
        <div class="container-fluid">
            <!-- chi tiết sản phẩm desktop -->
            <div class="wp-img-ctsp hidden-xs">
                <div class="row" style="position: relative;">
                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <div class="wp-img-left">
                            <div class="tab-content">
                                <div id="img-id4146" class="tab-pane fade row active in">
                                    <!-- ảnh cắt với kích thức 703x800 -->
                                    <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                        <img src="{{asset('images-demo/1590831433.jpg')}}">
                                    </div>
                                    <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                        <img src="{{asset('images-demo/1590831440.jpg')}}">
                                    </div>
                                    <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                        <img src="{{asset('images-demo/1590831446.jpg')}}">
                                    </div>
                                    <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                        <img src="{{asset('images-demo/1590831453.jpg')}}">
                                    </div>
                                </div> <!-- end -->

                                <div id="img-id4145" class="tab-pane fade row">
                                    <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                        <img src="{{asset('images-demo/1590831387.jpg')}}">
                                    </div>
                                    <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                        <img src="{{asset('images-demo/1590831396.jpg')}}">
                                    </div>
                                    <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                        <img src="{{asset('images-demo/1590831403.jpg')}}">
                                    </div>
                                    <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                        <img src="{{asset('images-demo/1590831409.jpg')}}">
                                    </div>
                                </div><!--  end -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12 pca-pl-r fixed-menu" >
                        <div class="wp-text-right">
                            <h1 class="h1-title-ctsp">Quần 9872</h1>
                            <div class="price-ctsp"><span class="int" style="margin-right: 10px;">70.000 đ</span></div>
                            <div class="wpmaxx">
                                <p>Mã sản phẩm: 002697</p>
                                <p>Trạng thái: Còn hàng</p>
                            </div>
                            <!-- màu sản phẩm -->
                            <div class="wp-chonmau">
                                <ul class="nav nav-pills">
                                    <li class="chose_attr_advanced_color active" data-title="Da"><a class="" data-toggle="pill" href="#img-id4146">
                                        <span class="color color4" style="background: url('{{asset('images-demo/1590831427.jpg')}}')"></span></a>
                                    </li>
                                    <li class="chose_attr_advanced_color" data-title="Đen"><a class="" data-toggle="pill" href="#img-id4145">
                                        <span class="color color4" style="background: url('{{asset('images-demo/1590831382.jpg')}}')"></span></a>
                                    </li>
                                </ul>
                            </div> <!-- end -->
                            <div class="wp-chonsize">
                                <ul class="ul-b list-size">                                        
                                    <li><a href="javascript:void();" class="filtersize active" data-title="F" data-saleoff="70000" data-id="F ">F</a></li>                                        
                                    <div class="error_size"></div>
                                </ul>
                            </div>                            
                            <div class="huongdan-chonsize"><a href="#" data-toggle="modal" data-target="#modal-size">Hướng dẫn chọn size</a></div>
                            <div class="wwp-uudai-rieng"><p>Ưu đãi dành riêng cho bạn</p></div>
                            <div class="wp-btn-mua">
                                <button class="ajax-addtocart">Mua ngay<i class="fas fa-shopping-bag"></i></button>
                            </div>

                            <!-- ưu dãi -->
                            @include('front-end.content.uu_dai_product')

                            <!-- tab content -->
                             @include('front-end.content.content_product')

                        </div>
                    </div>
                </div>
            </div> <!-- end-->
            <!-- chi tiết sản phầm mobile -->
            <div class="wp-img-ctsp hidden-sm hidden-md hidden-lg" id="chitietsanphammobile">
                <div class="container">
                    <div class="wp-po-relative" style="position: relative;">
                        <div class="row" style="margin-right: -5px;margin-left:-5px;">
                            <div class="col-md-12" style="padding: 0px 6px">
                                <div id="load_albums_color">
                                    <div class="slide-sp-mobile owl-carousel">
                                        <div class="item">
                                            <div class="wp-img-slide-sp">
                                                <a href="javascript:void(0)">
                                                    <img src="{{asset('images-demo/1590831453.jpg')}}" alt="ảnh sản phẩm">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="wp-img-slide-sp">
                                                <a href="javascript:void(0)">
                                                    <img src="{{asset('images-demo/1590831440.jpg')}}" alt="ảnh sản phẩm">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-right: 0;margin-left:0;">
                            <div class="ps-relative">
                                <div class="wp-text-slide-sp-22" style="z-index: 2;background-color: #fff;">
                                    <div class="wp-top-text-sp-22">
                                        <div class="btn-click-show-top">
                                            <i class="fas fa-chevron-up"></i>
                                        </div>
                                        <h2 class="h1-title-ctsp" style="margin: 10px 0">Áo 5231</h2>
                                        <div class="price-ctsp">
                                            <span class="int" style="margin-right: 10px">160.000 đ</span>
                                        </div>
                                        <div class="wp-chonmau">
                                            <ul class="nav nav-pills">
                                                <li class="chose_attr_advanced_mobile  active" >
                                                    <a href="javascript:void();" class="s_color">
                                                        <span class="color" style="background: url('{{asset('images-demo/1590831427.jpg')}}')"></span>
                                                    </a>
                                                </li>
                                                <li class="chose_attr_advanced_mobile">
                                                    <a href="javascript:void();" class="s_color">
                                                        <span class="color" style="background: url('{{asset('images-demo/1590831382.jpg')}}')"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="wp-chonsize">
                                        <ul class="ul-b list-size">
                                            <li><a href="javascript:void();" class="filtersize active">34</a></li>
                                            <li><a href="javascript:void();" class="filtersize ">36</a></li>
                                            <div class="error_size"></div>
                                        </ul>
                                    </div>
                                    <div class="wp-bottom-text-sp-22" style="display: none;">
                                        <div class="wwp-uudai-rieng">
                                            <p>Ưu đãi dành riêng cho bạn</p>
                                        </div>

                                        <!-- ưu đãi -->
                                        @include('front-end.content.uu_dai_product')

                                        <!-- tab content -->
                                        @include('front-end.content.content_product')

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- đánh giá -->
            <div class="wp-review">
                <div class="wp-title-sec">
                    <h2 class="h2-title text-center">ĐÁNH GIÁ</h2>
                    <div class="so-danhgia">
                        <span>
                            <a href="javascript:void();" class="click_show_comment"> <span class="count_comments">0</span> Reviews</a>,
                            <a href="javascript:void();" class="click_show_comment"><span class="count_cauhoi">0</span> QAs</a>
                        </span>
                    </div>
                </div>
            </div> <!-- end -->
            <div class="box-datmua col-md-12 col-xs-12 col-sm-12">
                <div class="wp-icon">
                    <img src="{{asset('images/icon-c4.svg')}}" alt="sản phẩm đặc biệt">
                </div>
                <div class="wp-text col-md-8 col-sm-7 col-xs-12" style="text-align: center">
                    <p> Sản phẩm đặc biệt dành cho:</p>
                </div>
                <div class="wp-btn col-md-2 col-xs-12 col-sm-3" style="text-align: center">
                    <a href="javascript:void();" class="ajax-addtocart">ĐẶT MUA</a>
                </div>
            </div>
            <div class="sp-quantam">
                <div class="wp-title-spqt"><h2 class="h2-title">Có thể bạn quan tâm</h2></div>
                <div class="wp-list-sp-home">
                    <div class="row">
                         @include('front-end.content.product_list')
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- end nội dung -->

     <!-- modal-size -->
    @include('front-end.content.modal_size')


@endsection

@section('custom-js')

@endsection