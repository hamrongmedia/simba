@extends('front-end.layout.main')
@section('title')
Tìm kiếm
@endsection

@section('content')
    <section class="sec-main-page">
        <div class="wp-list-tin">
            <div class="container-fluid">
                <div class="wp-boloc">
                    <h1 class="h1-title-danhmuc">Tìm kiếm: {{$keyword}}</h1>
                </div>
                
                <div class="row">

                    <!-- phần sản phẩm -->
                    <div class="wp-list-sp-home list-danhmyc-spsp">
                        <div class="row row-eidt-0" style="margin-left: 0px;margin-right: 0px;" id="ajax-product-list">
                            <!--   bắt bầu vòng lặp sản phẩm -->
                            
                            @foreach ($result as $data)
                                @include('front-end.content.product_list', ['data' => $data])
                            @endforeach
                        </div>
                    </div>

                    <div id="ajax-product-pagination" style="text-align: center">
                        <div class="phantrang text-center">
                            {{-- <ul class="pagination">
                                <li><a href="#" rel="prev"><i class="fa fa-angle-double-left"></i></a></li>
                                <li class="active"><a>1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#" rel="next"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')

@endsection