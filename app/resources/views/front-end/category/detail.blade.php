@extends('front-end.layout.main')

@section('title')
Blog
@endsection

@section('content')

    <section class="sec-main-page">
            <div class="wp-titlle-tin-page" style="background: url({{asset('images-demo/venus-charm-cover.jpg')}});background-size: cover">
                <div class="container">
                    <div class="row text-center">
                        <h1>{{$cat->name}}</h1>
                        <span>Beutiful Inside!</span>
                    </div>
                </div>
            </div>
            <div class="wp-list-tin">
                <div class="container">
                    @foreach($posts as $post)
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
                                $truncated = Str::limit(strip_tags($post->content), 85);
                                ?>
                                <div style="" class="desssss">{{$truncated}}</div>
                            </div>
                        </div>
                    </div> <!-- end -->
                    @endforeach
                    <div id="ajax-product-pagination" style="text-align: center">
                        <div class="phantrang text-center">
                            <ul class="pagination">
                                <li><a href="#" rel="prev"><i class="fa fa-angle-double-left"></i></a></li>
                                <li class="active"><a>1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#" rel="next"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection

@section('custom-js')

@endsection