 <footer id="footer-site">
    <div class="container-fluid pd-0">
        <div class="wp-footer-main">
            <div class="row">
                @if (isset($bottom_menu))
                    @foreach ($bottom_menu->child as $item)
                    <div class="col-md-3 col-sm-6 col-xs-12 menu-tops">
                        <div class="wp-ft-main">
                            <h3 class="h3-title-ft">{{$item->title}}</h3>
                            @if ($item->child)
                                <ul class="ul-b list-ft-main">
                                    @foreach ($item->child as $child)
                                    <li><a target="_blank" href="{{$child->link}}" title="{{$child->title}}"> {{$child->title}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div> <!-- end -->
        <div class="wp-footer-top ">
            <div class="footer-content-s">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="wp-ft-top">
                            <h3 class="h3-title-ft">GỌI MUA HÀNG <span>(09:00-22:00)</span> </h3>
                            <p class="p-phone">
                                <i class="fas fa-phone-alt"></i>
                                <a href="tel:{{isset($themeOptionHeader->phone_setting) ? $themeOptionHeader->phone_setting : '#'}}"> <span>{{isset($themeOptionHeader->phone_setting) ? $themeOptionHeader->phone_setting : '#'}}</span></a>
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
                                <span><a href="tel:{{isset($themeOptionHeader->phone2_setting) ? $themeOptionHeader->phone2_setting : '#'}}">{{isset($themeOptionHeader->phone2_setting) ? $themeOptionHeader->phone2_setting : '#'}}</a></span>
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
                         <div class="wp-ft-top ft-form-ft">
                            <h3 class="h3-title-ft" style="display: none;">LIKE VENUS TRÊN MẠNG XÃ HỘI</h3>
                            <ul class="ul-b list-mxh">
                                <li><a href="{{isset($themeOptionSocial->facebook) ? $themeOptionSocial->facebook : '#'}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{isset($themeOptionSocial->instagram) ? $themeOptionSocial->instagram : '#'}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{{isset($themeOptionSocial->youtube) ? $themeOptionSocial->youtube : '#'}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="{{isset($themeOptionSocial->zalo) ? $themeOptionSocial->zalo : '#'}}" target="_blank" class="fa-zalo"><img src="{{asset('images/logo-zalo-vector.png')}}" alt="Zalo"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wp-ft-top ">
                            <h3 class="h3-title-ft">FANPAGE CỦA CHÚNG TÔI</h3>
                            <div class="ul-b list-ft-main">
                                <div class="wp-iframe-fb">
                                    {!!isset($themeOptionFooter->fanpage) ? $themeOptionFooter->fanpage : '#'!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--  end -->
        <div class="wp-footer-bottom">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="left-ft-bt">
                        <span>{{isset($themeOptionFooter->coppyright_setting) ? $themeOptionFooter->coppyright_setting : '#'}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- Đã tạo tên miền chỉ cần thay đổi 'page_id ' trên facebook là được vd https://www.facebook.com/Demo-512480479161381/--}}
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v8.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
attribution=setup_tool
page_id="512480479161381"
theme_color="#0084ff"
logged_in_greeting="Hãy để lại lời nhắn để chúng tôi phục vu bạn tốt hơn"
logged_out_greeting="Hãy để lại lời nhắn để chúng tôi phục vu bạn tốt hơn">
</div>
