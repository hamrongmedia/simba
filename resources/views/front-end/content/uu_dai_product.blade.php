<div class="wp-list-dinhvu2">
    <ul class="ul-b lits-dv2">
        <li>
            <div class="icon-dv2">
                <img src="{{$product_setting->product1_icon}}" alt="">
            </div>
            <div class="text-dv2">
                {!!isset($product_setting->product1_desc) ? $product_setting->product1_desc : ''!!}
            </div>
        </li>
        <li>
            <div class="icon-dv2">
                <img src="{{$product_setting->product2_icon}}" alt="">
            </div>
            <div class="text-dv2">
                {!!isset($product_setting->product2_desc) ? $product_setting->product2_desc : ''!!}
            </div>
        </li>
        <li>
            <div class="icon-dv2">
                <img src="{{$product_setting->product3_icon}}" alt="">
            </div>
            <div class="text-dv2">
                {!!isset($product_setting->product3_desc) ? $product_setting->product3_desc : ''!!}
            </div>
        </li>
        <li>
            <div class="icon-dv2">
                <img src="{{$product_setting->product4_icon}}" alt="">
            </div>
            <div class="text-dv2">
                {!!isset($product_setting->product4_desc) ? $product_setting->product4_desc : ''!!}
            </div>
        </li>
    </ul>
</div>