@extends('front-end.layout.main')

@section('title')
{{$post->title}}
@endsection

@section('content')

    <section class="sec-main-page">
        <div class="wp-content-cttin">
            <div class="container">
                <h1 class="h1-title-ct">
                    {{$post->title}}
                </h1>
                <p class="date-time">Ngày đăng: {{$post->created_at}}</p> 
                <!--  nôi dung -->
                <div class="contentimages">
                    {!! $post->content !!}
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
                        @foreach($new_post as $post)
                        <div class="col-md-4 col-sm-6 col-xs-12 blog-item">
                            <div class="wp-item-tin-a">
                                <div class="wp-img-tin-a img-cover">
                                    <a href="{{route('post.detail', $post->slug)}}">
                                     <!--    anh cắt 600x600 -->
                                        <img src="{{$post->image}}" alt="{{$post->title}}">
                                    </a>
                                </div>
                                <div class="wp-text-tin-a">
                                    <h3 class="h3-title" style="line-height: 17px">
                                        <a href="{{route('post.detail', $post->slug)}}">{{$post->title}}</a>
                                    </h3>
                                    <?php
                                    $truncated = Str::limit(strip_tags($post->content), 150);
                                    ?>
                                    <div style="" class="desssss">{{$truncated}}</div>
                                </div>
                            </div>
                        </div> <!-- end -->
                        @endforeach
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