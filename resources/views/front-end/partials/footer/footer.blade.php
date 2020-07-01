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
                            <li><a href="{{isset($themeOption->facebook) ? $themeOption->facebook : '#'}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{isset($themeOption->instagram) ? $themeOption->instagram : '#'}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{isset($themeOption->youtube) ? $themeOption->youtube : '#'}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="{{isset($themeOption->zalo) ? $themeOption->zalo : '#'}}" target="_blank" class="fa-zalo"><img src="{{asset('images/logo-zalo-vector.png')}}" alt="Zalo"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--  end -->
        <div class="wp-footer-main">
            <div class="row">
                @if (isset($bottom_menu))
                    @foreach ($bottom_menu->child as $item)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wp-ft-main">
                            <h3 class="h3-title-ft">{{$item->title}}</h3>
                            @if ($item->child)
                            <ul class="ul-b list-ft-main" style="display: none;">
                                @foreach ($item->child as $child)
                                <li><a target="_blank" href="{{$child->link}}" title="{{$child->title}}"> {{$child->title}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                            </ul>
                        </div>
                    </div>
                    @endforeach
                @endif


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
                    <span></span>
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
