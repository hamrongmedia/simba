@extends('front-end.main.page_main')

@section('title')
Bài post
@endsection

@section('content')

    <section class="sec-main-page">
        <div class="wp-content-cttin">
            <div class="container">
                <h1 class="h1-title-ct">
                    SÓNG TỚI, THÌ MÌNH MỞ CỬA HÀNG MỚI!
                </h1>
                <p class="date-time">Ngày đăng: 2020-06-01 14:38:47</p> 
                <!--  nôi dung -->
                <div class="contentimages">

                    <p><span style="font-size:18px;">Sóng tới, Venus Charm lại một lần nữa "chuyển mình". Để trở thành phiên bản tốt hơn so với phiên bản cũ.</span></p>
                    <p><span style="font-size:18px;">Lấy nguồn cảm hứng về nữ thần Venus sinh ra từ bọt biển, Venus Charm đã hoàn thiện bản thiết kế "Sóng tới"&nbsp;cho cửa hàng thứ 6 tại 112C1 Phạm Ngọc Thạch cùng không gian mua sắm HOÀN TOÀN MỚI. Với thiết kế đường lượn sóng mềm mại tại không gian cửa hàng, Venus Charm muốn cùng nàng tạo nên những trải nghiệm cảm xúc sắc nét và mới mẻ hơn bao giờ hết.</span></p>
                    <p>&nbsp;</p>
                    <p><img alt="" src="{{asset('images-demo/97945492-2637208763160899-2442535269736382464-o(1).jpg')}}"></p>
                    <p><img alt="" src="{{asset('images-demo/97945492-2637208763160899-2442535269736382464-o(1).jpg')}}"></p>
                    <p><span style="font-size:18px;">Sóng tới, chúng mình không ngại làm mới. Như đã hứa, chúng mình từng bước từng bước "chuyển mình" để đến gần nàng hơn.<br>
                    <br>
                    Venus Charm thay đổi vì nàng, vậy nàng có dám thay đổi để trở thành phiên bản tốt nhất của chính mình?<br>
                    <br>
                    Cùng chờ đón những đợt "Sóng tới"&nbsp;tiếp theo của Venus Charm nàng nhé! Coming Soon...</span></p>
                    <p>&nbsp;</p>
                    <p><img alt="" src="{{asset('images-demo/97945492-2637208763160899-2442535269736382464-o(1).jpg')}}"></p>
                    <div style="clear: both;height: 20px"></div>
                    <div style="clear: both;height: 20px"></div>

                </div> <!-- end nôi dung -->
                
                <!-- mamg xã hội -->
                <div class="sharethis-inline-share-buttons"></div>
                <div class="mb-40"></div>

                
                <!-- bài viết liên quan -->
                <div class="wp-tin-khac">
                    <div class="wp-title-spqt tin-khac">
                        <h2 class="h2-title">Tin tức khác</h2>
                    </div>
                    <div class="wp-list-tinkhac">
                         @include('front-end.content.list_post')
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('custom-js')
<!-- js mạng xã hội -->
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5ee08aae76fd6b0012055bc5&product=inline-share-buttons" async="async"></script>
@endsection


