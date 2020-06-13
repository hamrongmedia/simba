@extends('front-end.main.page_main')

@section('title')
Feedback
@endsection

@section('content')

     <section class="sec-main-page">
        <div class="wp-list-tin">
            <div class="container">
                <div class="wp-title-danhmuc-s">
                    <h1 class="h1-title-s">#Feedback Venus Charm</h1>
                </div>
                @include('front-end.content.list_feedback')
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