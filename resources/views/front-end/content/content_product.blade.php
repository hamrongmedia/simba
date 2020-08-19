<div class="wp-tab-mota">
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#tab-mt-1" data-tabsd=".tab-mt-1"><span>MÔ tả</span></a></li>
        <li><a data-toggle="tab" href="#tab-mt-2" data-tabsd=".tab-mt-2"><span>Phí ship</span></a></li>
        <li><a data-toggle="tab" href="#tab-mt-3" data-tabsd=".tab-mt-3"><span>Đổi trả</span></a></li>
    </ul>
    <div class="tab-content">
        <div id="tab-mt-1" class="tab-pane fade in active tab-mt-1 tab-contets">
            <div class="wp-sautab" style="padding: 15px 0px;">
                {{$product->description}}
            </div>
       </div>
        <div id="tab-mt-2" class="tab-pane fade tab-mt-2 tab-contets">
            <div class="wp-sautab" style="padding: 15px 0px;">
                {!!isset($product_setting->ship_product) ? $product_setting->ship_product : ''!!}
            </div>
        </div>
        <div id="tab-mt-3" class="tab-pane fade tab-mt-3 tab-contets">
            <div class="wp-sautab" style="padding: 15px 0px;">
                {!!isset($product_setting->refund_product) ? $product_setting->refund_product : ''!!}
            </div>
        </div>
    </div>
</div>
<div class="wp-form-sdt">                                
    <form action="" id="sform_phone" method="post">
        <div class="error uk-alert" style="display: none;"></div>
        <input type="text" class="form-group form-control phone" placeholder="Nhập số điện thoại" name="phone">
        <button class="btn btn-default btn-hover">Gọi lại cho tôi</button>
    </form>
</div>