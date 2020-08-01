@extends('front-end.layout.main')

@section('title', $product->name)

@section('title', $product->meta_title)
@section('description',  $product->meta_description)

@section('keywords', $product->meta_key)
@section('og:description', $product->meta_description)
@section('og:title', $product->meta_title ?? $product->name)
@section('og:image',  isset($product->image) ?  $product->image : '')

@section('css')
@parent
<style>
    
.stars {
    display: inline-block;
  }
  .stars input.star {
    display: none;
  }
  .stars label.star {
    float: right;
    padding: 2px;
    font-size: 14px;
    margin-bottom: 0;
    line-height: 1;
    color: #c3c3c3;
    transition: all .2s;
  }
  .stars input.star:checked ~ label.star:before {
    content: "\f005";
    color: #FD4;
    transition: all .25s;
    font-weight: 900
  }
  .stars input.star-1:checked ~ label.star:before {
    color: #F62;
  }
  .stars input.star-5:checked ~ label.star:before {
    color: #FE7;
  }
  .stars label.star:hover:before {
    content: "\f005";
    color: #c3c3c3;
    cursor: pointer;
  }
  .stars label.star:before {
    content: "\f005";
    color: #c3c3c3;
    font-family: 'Font Awesome\ 5 Free';
  }
</style>
@endsection


@section('content')
    <section class="sec-main-page">
        <div class="container-fluid">
            <div class="wp-spnb-margin">
                <!-- chi tiết sản phẩm desktop -->
                <div class="wp-img-ctsp hidden-xs">
                    <div class="row" style="position: relative;">
                        <div class="col-md-9 col-sm-8 col-xs-12">
                            <div class="wp-img-left">
                                <div class="tab-content">
                                    @if($product->product_attributes)
                                        @foreach($product->product_attributes as $pr_at)
                                            <div id="img-id{{$product->id}}{{$pr_at['pav1_id']}}" class="tab-pane fade row @if($loop->first) active in @endif  img-id{{$product->id}}{{$pr_at['pav1_id']}} tab-images">
                                                @if(count($pr_at['image_files']) > 0)
                                                    @foreach($pr_at['image_files'] as $img)
                                                        <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                                            @if($img)
                                                                <img src="{{ $img }}">
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                @else
                                                    @for($i=0;$i<4;$i++)
                                                        <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                                            <img src="{{ $product->thumbnail }}">
                                                        </div>
                                                    @endfor
                                                @endif
                                            </div> <!-- end -->
                                        @endforeach
                                    @else
                                        @for($i=0;$i<4;$i++)
                                            <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                                <img src="{{ $product->thumbnail }}">
                                            </div>
                                        @endfor
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 pca-pl-r fixed-menu" >
                            <div class="wp-text-right">
                                <h1 class="h1-title-ctsp">{{$product->name}}</h1>
                                <div class="price-ctsp">
                                    <div class="price-ctsp">
                                        <span class="int" style="margin-right: 10px">
                                            @if($product->price) {{$product->price}} đ @endif
                                        </span>
                                        <span class="span-gia" style="text-decoration: line-through;color: #333333;font-weight: normal;font-size: 14px;">
                                            @if($product->promotion_price){{$product->promotion_price}} đ @endif
                                        </span>                               
                                    </div>
                                </div>
                                <div class="wpmaxx">
                                    <p>Mã sản phẩm: {{ $product->product_code }}</p>
                                    <p>Trạng thái: 
                                        @if($product->status == 1)
                                            Còn hàng
                                        @else
                                            Hết hàng
                                        @endif
                                    </p>
                                </div>
                                <!-- màu sản phẩm -->
                                <div class="wp-chonmau add_bag_color">
                                    @if($product->product_attributes)
                                        <ul class="nav nav-pills">
                                            @foreach($product->product_attributes as $pr_at)
                                            <li class="chose_attr_advanced_color @if ($loop->first) active @endif" data-color="{{ $pr_at['pav1_id'] }}" data-sizeids="{{ $pr_at['sizeids'] }}|" data-title="{{ $pr_at['pav1_name'] }}">
                                                <a class="" data-toggle="pill" href="#img-id{{$product->id}}{{$pr_at['pav1_id']}}"  data-red=".img-id{{$product->id}}{{$pr_at['pav1_id']}}" >
                                                   <!--  <img class="imgAuto" src="{{$pr_at['image_path']}}"> -->
                                                    <span class="color color4" style="background: url('{{$pr_at['image_path']}}')"></span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div> <!-- end -->
                                @if($product->all_sizes)
                                    <div class="wp-chonsize add_bag_size">
                                        <ul class="ul-b list-size">  
                                            @foreach($product->all_sizes as $k => $size)
                                                <li data-size="{{ $k }}">{{ $size }}</li>
                                            @endforeach  
                                        </ul>
                                        <p class="sizeError" style="display: none">Vui lòng chọn kích cỡ</p>
                                    </div>   
                                @endif                             
                                <div class="huongdan-chonsize"><a href="#" data-toggle="modal" data-target="#modal-size">Hướng dẫn chọn size</a></div>
                                <div class="wwp-uudai-rieng"><p>Ưu đãi dành riêng cho bạn</p></div>
                                <div class="wp-btn-mua">
                                    <input type="hidden" id="productId" value="{{ $product->id }}">
                                    <button class="ajax-addtocart" data-href="{{ route('cart.add') }}" data-product-type={{ $product->type }}>
                                        Mua ngay  <i class="fas fa-shopping-bag"></i>
                                    </button>
                                </div>
                                <!-- ưu dãi -->
                                @include('front-end.content.uu_dai_product')

                                <!-- tab content -->
                                 @include('front-end.content.content_product')

                            </div>
                        </div>
                    </div>
                </div> <!-- end-->
                 <!-- chi tiết sản phầm mobile -->
                <div class="wp-img-ctsp hidden-sm hidden-md hidden-lg" id="chitietsanphammobile">
                    <div class="container">
                        <div class="wp-po-relative" style="position: relative;">
                            <div class="row" style="margin-right: -5px;margin-left:-5px;">
                                <div class="col-md-12" style="padding: 0px 6px">
                                    <div id="load_albums_color">
                                        <div class="tab-content">
                                            @if($product->product_attributes)
                                                @foreach($product->product_attributes as $pr_at)
                                                    <div id="img-id1{{$product->id}}{{$pr_at['pav1_id']}}" class="tab-pane fade row @if($loop->first) active in @endif  img-id1{{$product->id}}{{$pr_at['pav1_id']}} tab-images">
                                                        @if(count($pr_at['image_files']) > 0)
                                                            @foreach($pr_at['image_files'] as $img)
                                                                <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                                                    @if($img)
                                                                        <img src="{{ $img }}" alt="ảnh sản phẩm">
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            @for($i=0;$i<4;$i++)
                                                                <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                                                       <img src="{{ $product->thumbnail }}">
                                                                </div>
                                                            @endfor
                                                        @endif
                                                    </div> <!-- end -->
                                                @endforeach
                                            @else
                                                @for($i=0;$i<4;$i++)
                                                    <div class="wp-sautab img-cover col-md-6 col-xs-6 col-sm-6">
                                                        <img src="{{ $product->thumbnail }}">
                                                    </div>
                                                @endfor
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-right: 0;margin-left:0;">
                                <div class="ps-relative">
                                    <div class="wp-text-slide-sp-22" style="z-index: 2;background-color: #fff;">
                                        <div class="wp-top-text-sp-22">
                                            <div class="btn-click-show-top">
                                                <i class="fas fa-chevron-up"></i>
                                            </div>
                                            <h2 class="h1-title-ctsp" style="margin: 10px 0">{{$product->name}}</h2>
                                            <div class="price-ctsp">
                                                <span class="int" style="margin-right: 10px">
                                                    @if($product->price) {{$product->price}} đ @endif
                                                </span>
                                                <span class="span-gia" style="text-decoration: line-through;color: #333333;font-weight: normal;font-size: 14px;">
                                                    @if($product->promotion_price){{$product->promotion_price}} đ @endif
                                                </span>                   
                                            </div>
                                            <div class="wp-chonmau">
                                                @if($product->product_attributes)
                                                    <ul class="nav nav-pills">
                                                        @foreach($product->product_attributes as $pr_at)
                                                        <li class="chose_attr_advanced_color chose_attr_advanced_mobile @if ($loop->first) active @endif" data-color="{{ $pr_at['pav1_id'] }}" data-sizeids="{{ $pr_at['sizeids'] }}|" data-title="{{ $pr_at['pav1_name'] }}">
                                                            <a class="s_color" data-toggle="pill" href="#img-id1{{$product->id}}{{$pr_at['pav1_id']}}"  data-reds=".img-id1{{$product->id}}{{$pr_at['pav1_id']}}" >
                                                               <!--  <img class="imgAuto" src="{{$pr_at['image_path']}}"> -->
                                                               <span class="color color4" style="background: url('{{$pr_at['image_path']}}')"></span>
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                        @if($product->all_sizes)
                                            <div class="wp-chonsize add_bag_size">
                                                <ul class="ul-b list-size">  
                                                    @foreach($product->all_sizes as $k => $size)
                                                        <li data-size="{{ $k }}">{{ $size }}</li>
                                                    @endforeach  
                                                </ul>
                                                <p class="sizeError" style="display: none">Vui lòng chọn kích cỡ</p>
                                            </div>   
                                        @endif             
                                        <div class="wp-bottom-text-sp-22" style="display: none;">
                                            <div class="wwp-uudai-rieng">
                                                <p>Ưu đãi dành riêng cho bạn</p>
                                            </div>

                                            <!-- ưu đãi -->
                                            @include('front-end.content.uu_dai_product')

                                            <!-- tab content -->
                                            @include('front-end.content.content_product')

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- đánh giá -->
                <div class="wp-review">
                    <div class="wp-title-sec">
                        <h2 class="h2-title text-center">ĐÁNH GIÁ</h2>
                        <div class="so-danhgia">
                            <span>
                                <a href="javascript:void()" class="click_show_comment"> <span class="count_comments">0</span> Reviews</a>,
                                <a href="javascript:void()" class="click_show_comment"><span class="count_cauhoi">0</span> QAs</a>
                            </span>
                        </div>
                        <div id="tab-content-none" style="display: none;">
                            <div class="wp-btn-hoi">
                                <button data-toggle="modal" data-target="#modal-danhgia">VIẾT ĐÁNH GIÁ</button>
                    
                                <button data-toggle="modal" data-target="#modal-hoidap">ĐẶT CÂU HỎI</button>
                                <!-- modal -->
                                <div class="modal fade" id="modal-danhgia">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="wp-text-danhgia">
                                                    <form id="rateform"
                                                        action="{{route('admin.product_reviews.store')}}"
                                                        method="post">
                                                        <div class="wpdg1 form-group">
                                                            <p class="mb0">Đánh giá</p>
                                                            <span class="starRating stars">
                                                                <input value="5" class="star star-5" id="star-4-5" type="radio" name="star" data-value="5"/>
                                                                <label class="star star-5" for="star-4-5"></label>
                                                                <input value="4" class="star star-4" id="star-4-4" type="radio" name="star" data-value="4"/>
                                                                <label class="star star-4" for="star-4-4"></label>
                                                                <input value="3" class="star star-3" id="star-4-3" type="radio" name="star" data-value="3"/>
                                                                <label class="star star-3" for="star-4-3"></label>
                                                                <input value="2" class="star star-2" id="star-4-2" type="radio" name="star" data-value="2"/>
                                                                <label class="star star-2" for="star-4-2"></label>
                                                                <input value="1" class="star star-1" id="star-4-1" type="radio" name="star" data-value="1"/>
                                                                <label class="star star-1" for="star-4-1"></label>
                                                            </span>
                    
                                                        </div>
                                                        <div class="wpdg2 form-group">
                                                            <div class="error mt20 alert" ></div>
                                                        </div>
                                                        <div class="wpdg2 form-group">
                                                            <p class="mb0">Họ và tên</p>
                                                            <input name="fullname" class="form-control" id="rate-name"
                                                                placeholder="Nhập tên của bạn *" value="" type="text">
                    
                                                            <input type="hidden" name="star" id="hidden_star" value="">
                    
                                                            <input type="hidden" name="customersid" value="0">
                    
                                                        </div>
                    
                                                        <div class="wpdg3 form-group">
                    
                                                            <p class="mb0">Số điện thoại</p>
                    
                                                            <input title="Số điện thoại" name="phone" id="rate-phone" class="form-control"
                                                                placeholder="Số điện thoại *" value="" type="text">
                                                        </div>
                    
                                                        <div class="wpdg3 form-group">
                    
                                                            <p class="mb0">Email</p>
                    
                                                            <input title="Nhập địa chỉ Email" name="email" id="rate-email"
                                                                class="form-control" placeholder="Địa chỉ email *" value="" type="text">
                    
                                                        </div>
                    

                                                        <div class="wpdg2 form-group">
                    
                                                            <p class="mb0">Nội dung</p>
                    
                                                            <textarea rows="5" title="Nhập nội dung đánh giá / nhận xét" name="message"
                                                                id="rate-content" placeholder="Nhập nội dung đánh giá / nhận xét..."
                                                                class="form-control" aria-required="true"></textarea>
                                                        </div>
                                                        <button class="btn btn-danger" type="submit">Gửi đánh giá</button>
                    
                                                    </form>
                    
                    
                                                </div>
                    
                                            </div>
                    
                                        </div>
                    
                                    </div>
                    
                                </div>
                    
                                <div class="modal fade" id="modal-hoidap">
                    
                                    <div class="modal-dialog">
                    
                                        <div class="modal-content">
                    
                                            <div class="modal-header">
                    
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                    
                                            </div>
                                            <div class="modal-body">
                                                <div class="wp-cauhoi">
                                                    <h4>Hỏi đáp</h4>
                                                    <form action="https://venuscharm.com.vn/comments/ajax/comments/addquestion.html"
                                                        method="post" id="rateformCH">
                                                        <div class="wpdg2 form-group">
                                                            <div class="errorcauhoi mt20 alert" style="display: none;"></div>
                                                        </div>
                                                        <input name="fullname" class="form-control wpdg2 form-group" id="rate-namecauhoi"
                                                            placeholder="Nhập tên của bạn *" value="" type="text">
                                                        <input type="hidden" name="customersid" value="0">
                                                        <textarea rows="5" title="Nhập nội dung đánh giá / nhận xét" name="message"
                                                            id="rate-contentcauhoir" placeholder="Nhập nội dung câu hỏi..."
                                                            class="wpdg2 form-group form-control" aria-required="true"></textarea>
                    
                                                        <button class="btn btn-danger" type="submit">Gửi câu hỏi</button>
                    
                                                    </form>

                                                </div>
                    
                                            </div>
                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wp-tab-content-review">
                                <ul class="nav nav-pills">
                                    <li class="active"><a data-toggle="pill" href="#rv1"><span>Đánh giá</span></a></li>
                                    <li><a data-toggle="pill" href="#rv2"><span>Hỏi đáp</span></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="rv1" class="tab-pane fade in active">
                                        <div class="wp-sautab">
                                            <p class="b-mn "><span class="count_comments">0</span> đánh giá</p>
                                            <div class="wp-list-danhgia comment-list"></div>
                    
                                            <style>
                                                .left-dg h4 {
                    
                                                    margin-bottom: 0px;
                    
                                                    font-family: Mon2;
                    
                                                    line-height: 25px;
                    
                                                }
                    
                                                .combody-at strong i {
                    
                                                    margin-left: 0px;
                    
                                                }
                    
                                                #modal-danhgia .modal-dialog,
                                                #modal-hoidap .modal-dialog {
                                                    top: 10% !important;
                                                }
                                            </style>
                                        </div>
                                    </div>
                                    <div id="rv2" class="tab-pane fade">
                                        <div class="wp-sautab cauhoi-list">
                                        </div>
                                    </div>
                                </div>
                    
                            </div>
                        </div>
                    </div>
                </div> <!-- end -->
                <div class="box-datmua col-md-12 col-xs-12 col-sm-12">
                    <div class="wp-icon">
                        <img src="{{asset('images/icon-c4.svg')}}" alt="sản phẩm đặc biệt">
                    </div>
                    <div class="wp-text col-md-8 col-sm-7 col-xs-12" style="text-align: center">
                        <p> Sản phẩm đặc biệt dành cho:</p>
                    </div>
                    <div class="wp-btn col-md-2 col-xs-12 col-sm-3" style="text-align: center">
                        <a href="javascript:void()" class="ajax-addtocart" data-href="{{ route('cart.add') }}" data-product-type={{ $product->type }}>ĐẶT MUA</a>
                    </div>
                </div>
                <div class="sp-quantam">
                    <div class="wp-title-spqt"><h2 class="h2-title">Có thể bạn quan tâm</h2></div>
                    <div class="wp-list-sp-home">
                        <div class="row">
                            @if($datas)
                                @foreach ($datas as $data)
                                    @include('front-end.content.product_list')
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- end nội dung -->

     <!-- modal-size -->
    @include('front-end.content.modal_size')

@endsection

@section('custom-js')
    <script type="text/javascript">
                    
        $(function () {


            $('.full').on('click', function () {

                var star = $(this).attr('data-value');

                $('#hidden_star').attr('value', star);

            });

            $('.error').hide();

            var module = 'products';

            var moduleid = '{{$product->id}}';

            // listComment(module, moduleid, $('.comment-list').attr('data-page'));

            var uri = $('#rateform').attr('action');

            $('#rateform').on('submit', function () {

                var postData = $(this).serialize();

                var fullname = $('#rate-name').val();

                var email = $('#rate-email').val();

                var phone = $('#rate-phone').val();

                var contents = $('#rate-content').val();
            
                $.ajax({
                    type: 'post',
                    url: uri,
                    data: {
                        product_id: moduleid,
                        customer_name: fullname,
                        customer_email: email,
                        customer_phone: phone,
                        comment: contents,
                        star: $('input[name="star"]:checked').val()
                    },

                }).done(function(data){

                    $('.error').show();
                    $('#rateform .error').removeClass('alert alert-danger').addClass('alert alert-success');
                    $('#rateform .error').html('Cảm ơn quý khách đã phản hồi!')


                }).fail(function(errors){

                    $('.error').show();
                    error = JSON.parse(errors.responseText);
                    errList = Object.values(error.errors);
                    errString = errList.reduce(function(temp, item){
                        return temp + item[0] + '| ';
                    }, '');

                    $('#rateform .error').removeClass('alert alert-success').addClass('alert alert-danger');
                    $('#rateform .error').html('<strong>' + errString + '</strong>')
                })

                return false;

            });

            $(document).on('click', '.ajax-pagination .uk-pagination li a', function () {

                var page = $(this).attr('data-ci-pagination-page');

                //listComment(module, moduleid, page);

                return false;

            });

        });

        // function listComment(module, moduleid, page) {

        //     var uri = "#";

        //     $.post(uri, {

        //         module: module, moduleid: moduleid, page: page
        //     },

        //         function (data) {

        //             var json = JSON.parse(data);

        //             $('.comment-list').html(json.html);

        //             $('.count_comments').html(json.count_comments);

        //         });
        // }
    </script>
    <script>
        $('#tab-content-none').hide();
        $('.click_show_comment').click(function(){
            $('#tab-content-none').show();

        });
    </script>
                
{{--     <script type="text/javascript">

        $(function () {

            $('.errorcauhoi').hide();

            var module = 'products';

            var moduleid = '883';

            listCauhoi(module, moduleid, $('.cauhoi-list').attr('data-page'));



            var uri = $('#rateformCH').attr('action');

            $('#rateformCH').on('submit', function () {

                var postData = $(this).serializeArray();

                var contents = $('#rate-contentcauhoir').val();

                var fullname = $('#rate-namecauhoi').val();

                $.post(uri, {

                    post: postData, fullname: fullname, module: module, moduleid: moduleid, contents: contents, parentid: 0
                },

                    function (data) {

                        var json = JSON.parse(data);

                        $('.errorcauhoi').show();

                        if (json.error.length) {

                            $('#rateformCH .errorcauhoi').removeClass('alert alert-success').addClass('alert alert-danger');

                            $('#rateformCH .errorcauhoi').html('').html(json.error);

                        } else {

                            $('#rateformCH .errorcauhoi').removeClass('alert alert-danger').addClass('alert alert-success');

                            $('#rateformCH .errorcauhoi').html('').html('Gửi câu hỏi thành công!.');

                            $('#rateformCH').trigger("reset");

                            setTimeout(function () { window.location.href = 'https://venuscharm.vn/ao-203-p883.html'; }, 3000);

                        }

                    });

                return false;

            });

            $(document).on('click', '.ajax-pagination-cauhoi .uk-pagination li a', function () {

                var page = $(this).attr('data-ci-pagination-page');

                listCauhoi(module, moduleid, page);

                return false;

            });



        });

        function listCauhoi(module, moduleid, page) {

            var uri = '#';

            $.post(uri, {

                module: module, moduleid: moduleid, page: page
            },

                function (data) {

                    var json = JSON.parse(data);

                    $('.cauhoi-list').html(json.html);

                    $('.count_cauhoi').html(json.count_comments);

                });

        }
    </script> --}}
@endsection