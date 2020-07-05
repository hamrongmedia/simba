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
                                            <a href="{{url('/')}}">
                                                <img class="img-responsive" src="{{isset($themeOptionHeader->logo_setting) ? $themeOptionHeader->logo_setting : '#'}}" alt="">
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
                                    <!-- mobile -->
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
                                    </div><!--  end mobile -->
                                </div>
                            </div>
                            <div class="col-md-6 hidden-sm hidden-xs">
                                <!-- menu desktop -->
                                @include('front-end.partials.header.menu_desktop')
                                
                            </div>
                            <div class="col-md-4 hidden-sm hidden-xs">
                                <div class="wp-main-header-right">
                                    <?php /** form tim kiếm **/ ?>
                                    <div class="wp-search">
                                        <form action="" method="get">
                                            <button class="btn btn-default btn-search" type="submit">
                                                <i class="far fa-search" aria-hidden="true"></i>
                                            </button>
                                            <input type="text" placeholder="Bạn cần tìm gì" value="" name="key" class="form-control">
                                        </form>
                                    </div><!--  end -->
                                    <div class="wp-cart">
                                        <a class="btn-click-cart"><i class="fas fa-shopping-cart"></i></a>
                                    </div> <!-- end -->
                                </div>
                            </div>
                            <!-- giỏ hàng -->
                            @include('front-end.partials.header.gio_hang')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- menu mobile -->

    @include('front-end.partials.header.menu_mobile')

</header> <!-- end header -->