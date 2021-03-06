@extends('front-end.main.page_main')

@section('title')
Blog
@endsection

@section('content')

    <section class="sec-main-page">
            <div class="wp-titlle-tin-page" style="background: url({{asset('images-demo/venus-charm-cover.jpg')}});background-size: cover">
                <div class="container">
                    <div class="row text-center">
                        <h1>NEW VENUS STORY</h1>
                        <span>Beutiful Inside!</span>
                    </div>
                </div>
            </div>
            <div class="wp-list-tin">
                <div class="container">
                    @include('front-end.content.list_post')


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