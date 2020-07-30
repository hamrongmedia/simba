<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('front-end.partials.header.head')
<body class="page-child">
    @include('front-end.partials.header.header')
    <!-- Nội dung conter -->
    <form method="POST" action="{{route('checkout.store')}}">
        @csrf
        <main id="main-thanhtoan">
            <div class="container">
                <div class="wp-header-thanhtoan">
                    <div class="wp-logo-fft">
                        <a href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" alt="Venus Charm"></a>
                    </div>
                    <p><i class="fas fa-question-circle"></i><span> Thông tin khách hàng tuyệt đối bảo mật</span></p>
                </div>
                <div class="row row-tt">
                    <div class="col-md-6 col-sm-12 col-xs-12 fl-right">
                        <div class="wp-right-tt">
                            <div class="wp-list-sp">
                                <ul class="ul-b list-sp-tt">
                                    @php
                                        $subtotal = 0;
                                    @endphp
                                    @if($cartItems)
                                        @foreach ($cartItems as $cartItem)
                                            @php $subtotal += $cartItem->price * $cartItem->quantity; @endphp
                                            <li class="item-sp-tt">
                                                <div class="img-sp-tt">
                                                    <a href="{{ route('product.detail',['slug'=>$cartItem->product_slug]) }}" target="_blank" title="{{ $cartItem->name }}">
                                                        @if($cartItem->thumbnail)
                                                            <img src="{{ $cartItem->thumbnail }}" alt="{{ $cartItem->name }}">
                                                        @else
                                                            <img src="{{asset('template/images/placeholder.png')}}" alt="{{ $cartItem->name }}">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="text-sp-tt">
                                                    <h4 class="h4-title">{{ $cartItem->name }}</h4>
                                                    <div class="price">
                                                        <span>{{ \App\Helpers\Common::priceFormat($cartItem->price) }}đ</span>
                                                    </div>
                                                    <span class="pro-price-view">Số lượng: {{ $cartItem->quantity }}</span>
                                                    @if($cartItem->type == \App\Models\Product::PRODUCT_ATTRIBUTE)
                                                        <ul class="mau-size">
                                                            @if($cartItem->pav1_id)
                                                                <li>Màu sắc : {{ $cartItem->pav1_value }}</li>
                                                            @endif
                                                            @if($cartItem->pav2_id)
                                                                <li>Size : {{ $cartItem->pav2_value }}</li>
                                                            @endif
                                                        </ul>
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="list-thanhtien">
                                <ul class="ul-b list-da">
                                    <li>
                                        <span>Tạm tính</span>
                                        <span class="sp2">{{ \App\Helpers\Common::priceFormat($subtotal) }}đ</span>
                                    </li>
                                    <li>
                                        <span>Phí vận chuyển</span>
                                        <input type="hidden" name="shipcode">
                                        <div class="price_tt sp2" id="shipcode_value" data-price="">
                                            <input type="hidden" name="shipcode_value" value="0">
                                            <span id="shipcode-uppercase"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tongtien">
                                <div class="">
                                    <input type="hidden" name="userid" value="">
                                    <input type="hidden" name="total_cart_money" id="total_cart_money" value="{{ $subtotal }}">
                                    <span>Tổng cộng</span>
                                    <span id="price_tt" class="sp2">{{ \App\Helpers\Common::priceFormat($subtotal) }} đ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 fl-left">
                        <div class="wp-left-tt">
                            <h2 class="h2-title p-mon">Thông tin giao hàng</h2>
                            <div class="wp-form-tt">
                                <div class="form-group">
                                    <input type="text" name="fullname" class="text form-control" placeholder="Ví dụ: Nguyễn Văn A" value="{{ old('fullname') }}">
                                    @if ($errors->first('fullname'))
                                        <div class="error">{{ $errors->first('fullname') }}</div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <input type="text" name="email" class="text form-control input-to" placeholder="supportxyz@gmail.com" value="{{ old('email') }}">
                                            @if ($errors->first('email'))
                                                <div class="error">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="text" name="phone" class="text form-control input-nho" placeholder="Ví dụ: 0987654321" value="{{ old('phone') }}">
                                            @if ($errors->first('phone'))
                                                <div class="error">{{ $errors->first('phone') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col right">
                                        <input type="text" name="address" class="text form-control" placeholder="Ví dụ: Số 10, Ngõ 50, Đường ABC" value="{{ old('address') }}">
                                    </div>
                                </div>
                                <div class="form-group group-city">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="province_id" class="form-control" id="province" >
                                                <option value="">-- Tỉnh/Thành Phố --</option>
                                            </select>
                                            @if ($errors->first('province_id'))
                                                <div class="error">{{ $errors->first('province_id') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="district_id" id="district_id">
                                                <option value="">-- Quận/Huyện --</option>
                                            </select>
                                            @if ($errors->first('district_id'))
                                                <div class="error">{{ $errors->first('district_id') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="war_id" id="war_id">
                                                <option value="">-- Phường/Xã --</option>
                                            </select>
                                            @if ($errors->first('war_id'))
                                                <div class="error">{{ $errors->first('war_id') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="text form-control" placeholder="Ví dụ: Chuyển hàng ngoài giờ hành chính">{{ old('message') }}</textarea>
                                </div>
                                <div class="wp-pt-thanhtoan" id="click_hidden" >
                                    <p class="p-mon">Phí vận chuyển</p>
                                    <div class="content-box  blank-slate">
                                        <i class="blank-slate-icon icon icon-closed-box "></i>
                                        <p>Vui lòng chọn tỉnh / thành để có danh sách phương thức vận chuyển.</p>
                                    </div>
                                </div>
                                <div class="wp-pt-thanhtoan" id="wp-pt-thanhtoan" style="display: none;">
                                    <p class="p-mon">Phí vận chuyển</p>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="shop" id="phi_shop" name="pt-tt" checked=""> Thanh toán khi nhận hàng (COD) <span id="phi_ship">33.000 đ</span>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="inner" id="phi_inner" name="pt-tt">Thanh toán chuyển khoản trước <span id="phi_vanchuyen">33.000 đ</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="phuongthuc-ttt" id="phuongthuc-ttt" style="display: none;" >
                                    <p class="p-mon">Phương thức thanh toán</p>
                                    <div class="wp-list-thanhtoan-a">
                                        <ul class="ul-b">
                                            <li id="offline">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="cod" id="cod-thanhtoan" name="pt-tt2" checked="" onclick="checkED()"> Thanh toán khi nhận hàng
                                                    </label>
                                                </div>
                                            </li>
                                            <li id="hiddenshow">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="Chuyển khoản" id="online-thanhtoan" name="pt-tt2"> Chuyển khoản
                                                    </label>

                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="btn-thanhtoan">
                                    <a href="javascript:void(0);" onclick="goBack()"><i class="fas fa-arrow-left"></i>&nbsp;Tiếp tục mua hàng</a>
                                    <button type="submit" name="create" value="create" class="uk-button btn btn-default" style="border: 0px">Hoàn tất đơn hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </form>
    <!-- chân trang -->
     @include('front-end.partials.footer.footer')
</body>

<style>
    #footer-site,
    #header-site{
        display: none;
    }

</style>
@include('front-end.partials.footer.js')
<script type="text/javascript">
    function number_format (number, decimals, dec_point, thousands_sep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
    $(document).ready(function(){
        load_total_price_cart();
        <!--tính phí vận chuyển-->
        $('#phi_shop').change(function() {

            $("#province > option:selected").each(function() {
                var phi_shop = $('#phi_shop').attr('data-value');
                $('#shipcode_value').attr('data-price', phi_shop);
                $('#shipcode_value').find('input').attr('value', phi_shop);
                $('#shipcode-uppercase').html(number_format(phi_shop, 0, '.', '.')+' đ');
                load_total_price_cart();
            });
        });
        $('#phi_inner').change(function() {
            $("#province > option:selected").each(function() {
                var phi_inner = $('#phi_inner').attr('data-value');
                $('#shipcode_value').attr('data-price', phi_inner);
                $('#shipcode_value').find('input').attr('value', phi_inner);
                $('#shipcode-uppercase').html(number_format(phi_inner, 0, '.', '.')+' đ');
                load_total_price_cart();
            });

        });
    });
    $('#province').change(function () {
        var city_id = $('#province').val();
        $('#click_hidden').hide();

        $('#wp-pt-thanhtoan').show();
        $('#phuongthuc-ttt').show();

        $('#phi_shop').attr('data-value','0');
        $('#phi_inner').attr('data-value','0');
        $('#phi_ship').html(number_format('0', 0, '.', '.')+' đ');
        $('#phi_vanchuyen').html(number_format('0', 0, '.', '.')+' đ');
        $('#shipcode_value').find('input').attr('value', 0);


        if(city_id == parseFloat(1)){
            $('#phi_shop').attr('data-value','22000');
            $('#phi_inner').attr('data-value','22000');
            $('#phi_ship').html(number_format('22000', 0, '.', '.')+' đ');
            $('#phi_vanchuyen').html(number_format('22000', 0, '.', '.')+' đ');
            $('#shipcode_value').find('input').attr('value', '22000');

        }else{
            $('#phi_shop').attr('data-value','33000');
            $('#phi_inner').attr('data-value','33000');
            $('#phi_ship').html(number_format('33000', 0, '.', '.')+' đ');
            $('#phi_vanchuyen').html(number_format('33000', 0, '.', '.')+' đ');
            $('#shipcode_value').find('input').attr('value', '33000');

        }
        

        $( "#phi_shop" ).prop( "checked", true );
        $( "#phi_inner" ).prop( "checked", false );
        $( "#cod-thanhtoan" ).prop( "checked", true );
        $( "#online-thanhtoan" ).prop( "checked", false );


        var phi_shop = $('#phi_shop').attr('data-value');
        $('#shipcode_value').attr('data-price', phi_shop);
        $('#shipcode_value').find('input').attr('value', phi_shop);
        $('#shipcode-uppercase').html(number_format(phi_shop, 0, '.', '.')+' đ');
        var salesoluong = 0;
        var saleKGVPT = 0;
        var shipcode = parseInt($('input[name="shipcode_value"]').val());
        var total = parseInt($('#total_cart_money').val());
        $('#price_tt').html(number_format(( total + shipcode - salesoluong - saleKGVPT), 0, '.', '.'+' đ'));
        $('#total_total').attr('data-price', (total + shipcode - salesoluong - saleKGVPT));
        $('#total_total').find('input').attr('value', (total + shipcode - salesoluong - saleKGVPT));
    });

    function load_total_price_cart(){
        var salesoluong = 0;
        var saleKGVPT = 0;
        var shipcode = parseInt($('input[name="shipcode_value"]').val());
        var total = parseInt($('#total_cart_money').val());
        $('#price_tt').html(number_format(( total + shipcode - salesoluong - saleKGVPT), 0, '.', '.')+' đ');
        $('#total_total').attr('data-price', (total + shipcode - salesoluong - saleKGVPT));
        $('#total_total').find('input').attr('value', (total + shipcode - salesoluong - saleKGVPT));
    }

    $('#wp-pt-thanhtoan').hide();
    $('#phuongthuc-ttt').hide();
    $("#hiddenshow" ).hide( );
    $('#phi_shop').click(function(){
        $( "#online-thanhtoan" ).prop( "checked", false );
        $( "#cod-thanhtoan" ).prop( "checked", true );
        $( "#offline" ).show( );
        $( "#hiddenshow" ).hide( );
        load_total_price_cart();
    });
    $('#phi_inner').click(function(){
        $( "#cod-thanhtoan" ).prop( "checked", false );
        $( "#online-thanhtoan" ).prop( "checked", true );
        $( "#offline" ).hide();
        $( "#hiddenshow" ).show();
        load_total_price_cart();
    });
    $(document).ready(function() {
        LoadCity();
        $('select#province').change(function()
        {
            LoadDistrict($(this).val());
        });
        $('select#district_id').change(function() {
            /* Act on the event */
            LoadWard($(this).val());
        });
    });
    $('#province').change(function () {
        $('#click_hidden').hide();
        $('#wp-pt-thanhtoan').show();
        $('#phuongthuc-ttt').show();   
    });
    function LoadCity(){
        actionUrl = '{{ route('ajax.cities') }}';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : actionUrl,
            type: 'GET',
            dataType: 'json',
            async: true,
        })
        .done(function(data){
            $.each(data, function(i, t){
                $("select#province").append('<option value="'+t.id+'">'+ t.name + '</option>');
            });
        })
        .fail(function(data) {
            alert('Lỗi');
        });
        return false;
    }
    function LoadDistrict(province_id){
        if (province_id != null){
            actionUrl = '{{ route('ajax.districts') }}';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: actionUrl,
                data:'provinceID=' + province_id,
                type: 'GET',
                dataType: 'json',
                timeout:3000,
                async : true
            })
            .done(function(data){
                $("select#district_id").html('');
                $("select#district_id").html('<option value="">--- Quận/huyện ---</option>');
                $.each(data, function(n, t)
                {
                    $("select#district_id").append('<option value="'+t.id+'">'+ t.name +'</option>');
                });
            })
            .fail(function(data){
            });
            return false;
        }
    }
    function LoadWard(district_id){
        if (district_id != null) {
            actionUrl = '{{ route('ajax.wards') }}';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: actionUrl,
                type: 'GET',
                data: 'districtID=' + district_id,
                dataType: 'json',
                async: true,
            })
            .done(function(r){
                $("select#war_id").html('');
                $("select#war_id").append('<option value="">--- Phường/xã ---</option>');
                $.each(r, function(i, v)
                {
                    $("select#war_id").append('<option value="'+ v.id+'" rel='+v.pre+'>' + v.name + '</option>');
                });
            })
            .fail(function(r) {
            });
            return false;
        };
    }
</script>
</html>
