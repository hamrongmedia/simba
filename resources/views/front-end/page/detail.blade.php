@extends('front-end.layout.main')

@section('title')
{{$page->title}}
@endsection

@section('content')

    <section class="sec-main-page">
        <div class="wp-content-cttin">
            <div class="container">
                <h1 class="h1-title-ct">
                    {{$page->name}}
                </h1>
                <p class="date-time">Ngày đăng: 2020-06-01 14:38:47</p> 
                <!--  nôi dung -->
                <div class="contentimages">
                    {!! $page->content !!}
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