<div class="wp-spnb-b">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 fix-right">
            <div class="wp-sp-nb sp-nb1">
               <!--  ảnh cắt 820x920 -->
                <a href="ao-lot.html"><img class="el_image" src="{{$homepageOption->term_img_main}}" alt="ÁO LÓT"></a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="wp-sp-nb sp-nb2">
                <div class="row">
                    @php
                        $sub_img = explode(',', $homepageOption->term_img_sub);
                    @endphp
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="wp-item-spnb2">
                           <!--  anh cắt 468x586 -->
                            <a href=""><img class="el_image" src="{{$sub_img[0] ?? ''}}" alt="Áo Bầu 2195"></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="wp-item-spnb2">
                            <!--  anh cắt 468x586 -->
                            <a href=""><img class="el_image" src="{{$sub_img[1] ?? ''}}" alt="Áo 8038"></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="wp-item-spnb2">
                            <!--  anh cắt 468x586 -->
                            <a href=""><img class="el_image" src="{{$sub_img[2] ?? ''}}" alt="Áo JM Siêu Đẩy"></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="wp-item-spnb2">
                            <!--  anh cắt 468x586 -->
                            <a href=""><img class="el_image" src="{{$sub_img[3] ?? ''}}" alt="ÁO LÓT 8055"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>