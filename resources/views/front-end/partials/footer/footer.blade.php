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

                            @include('admin.pages.customer_contact.contact_email_create')

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
