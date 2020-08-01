@extends('front-end.layout.main')

@section('title')
Chuyên mục sản phẩm
@endsection

@section('content')

    <section class="sec-main-page">
        <div class="wp-list-tin">
             <div class="wp-spnb-margin">
                   <div class="container-fluid">
                    <div class="row">
                        <div class="wp-boloc" style="position: relative">
                            <div class="wp-title">
                                <h1 class="h1-title-danhmuc">ÁO LÓT</h1>
                                <ul class="ul-b list-link-title hidden-xs hidden-sm" style="bottom: 3px">
                                    <li><a href="">ĐỆM DÀY</a></li>
                                    <li><a href="">ĐỆM VỪA</a></li>
                                    <li><a href="">ĐỆM MỎNG</a></li>
                                    <li><a href="">KHÔNG GỌNG</a></li>
                                    <li><a href="">CÓ GỌNG</a></li>
                                    <li><a href="">BRALETTE</a></li>
                                    <li><a href="">QUÂY NGANG</a></li>
                                    <li><a href="">PHỤ KIỆN</a></li>
                                    <li><a href="">ÁO LÓT TẠO KIỂU</a></li>
                                </ul>
                                <ul class="ul-b list-link-title slide-sp-title owl-carousel hidden-md hidden-lg" >
                                    <li class="item"><a href="">ĐỆM DÀY</a></li>
                                    <li class="item"><a href="">ĐỆM VỪA</a></li>
                                    <li class="item"><a href="">ĐỆM MỎNG</a></li>
                                    <li class="item"><a href="">KHÔNG GỌNG</a></li>
                                    <li class="item"><a href="">CÓ GỌNG</a></li>
                                    <li class="item"><a href="">BRALETTE</a></li>
                                    <li class="item"><a href="">QUÂY NGANG</a></li>
                                    <li class="item"><a href="">PHỤ KIỆN</a></li>
                                    <li class="item"><a href="">ÁO LÓT TẠO KIỂU</a></li>
                                </ul>
                            </div>
                            <!-- bộ lọc -->
                            <div class="filter">
                                <div class="boloc-a">
                                    <button class="btn-click-boloc">Bộ lọc</button>
                                    <button class="btn btn-danger close-fil"><i class="fas fa-times"></i></button>
                                    <div class="wp-bo-loc-1">
                                        <h2 class="h2-title">Bộ lọc nâng cao</h2>
                                        <div class="bl00 box-loc1">
                                            <h4 class="p-mon">Giá sản phẩm</h4>

                                            <ul class="ul-b list-boloc boloc1">
                                                <li>
                                                    <label class="checkbox-edit fillter-label tpInputLabel fill-line-0" data-line="fill-line-0"> Dưới 100.000 
                                                        <input type="checkbox" class="filter" name="attr[priceprd]" value="53" id="item-53">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-edit fillter-label tpInputLabel fill-line-0" data-line="fill-line-0"> 100.000 - 200.000 
                                                        <input type="checkbox" class="filter" name="attr[priceprd]" value="54" id="item-54">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-edit fillter-label tpInputLabel fill-line-0" data-line="fill-line-0"> 200.000 - 300.000   
                                                        <input type="checkbox" class="filter" name="attr[priceprd]" value="55" id="item-55">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-edit fillter-label tpInputLabel fill-line-0" data-line="fill-line-0"> Trên 300.000 
                                                        <input type="checkbox" class="filter" name="attr[priceprd]" value="56" id="item-56">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bl00 box-loc1">
                                            <h4 class="p-mon">Gọng</h4>

                                            <ul class="ul-b list-boloc boloc1">
                                                <li>
                                                    <label class="checkbox-edit fillter-label tpInputLabel fill-line-1" data-line="fill-line-1"> Có gọng 
                                                        <input type="checkbox" class="filter" name="attr[gong-gong]" value="57" id="item-57">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-edit fillter-label tpInputLabel fill-line-1" data-line="fill-line-1"> Không gọng         
                                                        <input type="checkbox" class="filter" name="attr[gong-gong]" value="58" id="item-58">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bl00 box-loc1">
                                            <h4 class="p-mon">Đệm</h4>
                                            <ul class="ul-b list-boloc boloc1">
                                                <li>
                                                    <label class="checkbox-edit fillter-label tpInputLabel fill-line-2" data-line="fill-line-2"> Đệm dày 
                                                        <input type="checkbox" class="filter" name="attr[dem-ao-lot]" value="59" id="item-59">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-edit fillter-label tpInputLabel fill-line-2" data-line="fill-line-2"> Đệm vừa  
                                                        <input type="checkbox" class="filter" name="attr[dem-ao-lot]" value="60" id="item-60">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-edit fillter-label tpInputLabel fill-line-2" data-line="fill-line-2"> Đệm mỏng               
                                                        <input type="checkbox" class="filter" name="attr[dem-ao-lot]" value="61" id="item-61">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <form class="d-none hidden" id="Formfilter" method="post" action="">
                                    <input type="text" value="" name="attr" id="attr" class="confirm-filter">
                                    <input type="text" value="1" name="page" id="page" class="">
                                    <input type="text" value="85" name="cataloguesid" id="cataloguesid" class="">
                                    <input type="submit" value="" name="submit" id="filter_submit" class="">
                                </form>
                            </div> <!-- end -->
                        </div>

                        <!-- phần sản phẩm -->
                        <div class="wp-list-sp-home list-danhmyc-spsp">
                            <div class="row row-eidt-0" style="margin-left: 0px;margin-right: 0px;" id="ajax-product-list">
                                <!--   bắt bầu vòng lặp sản phẩm -->
                                {{--  @include('front-end.content.product_list') --}}
                            </div>
                        </div>

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
             </div>
        </div>
    </section>

@endsection

@section('custom-js')

@endsection