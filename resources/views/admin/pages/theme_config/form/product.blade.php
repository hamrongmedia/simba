<div id="header-setting" class="tab-pane active">
    <h3 class="box-title">{{$page_name}}</h3>
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Cam kết sản phẩm</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Phí Ship</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Đổi trả</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <div class="form-group">
            <label for="">Nhập Icon1</label>
            @if($value != null && isset($value->product1_icon))
             @include('admin.component.image_button', ['name' => 'product1_icon', 'id' => 'product1-icon', 'value' => $value->product1_icon, 'holder' => 'product1-icon-holder','holder_img' => $value->product1_icon])
            @else
             @include('admin.component.image_button', ['name' => 'product1_icon', 'id' => 'product1-icon', 'value' => '', 'holder' => 'product1-icon-holder'])
            @endif
          </div>
          <div class="form-group">
            <label for="">Nhập mô tả 1</label>
              @if($value != null && isset($value->product1_desc))
               <textarea class="form-control" name="product1_desc" rows="4"  name="product1_desc">{{$value->product1_desc}}</textarea>
              @else
              <textarea class="form-control" rows="4" placeholder="Enter ..." name="product1_desc"></textarea>
              @endif
          </div>
          <hr>
          <div class="form-group">
            <label for="">Nhập Icon2</label>
            @if($value != null && isset($value->product2_icon))
             @include('admin.component.image_button', ['name' => 'product2_icon', 'id' => 'product2-icon', 'value' => $value->product2_icon, 'holder' => 'product2-con-holder','holder_img' => $value->product2_icon])
            @else
             @include('admin.component.image_button', ['name' => 'product2_icon', 'id' => 'product2-icon', 'value' => '', 'holder' => 'product2-icon-holder'])
            @endif
          </div>
          <div class="form-group">
            <label for="">Nhập mô tả 2</label>
              @if($value != null && isset($value->product2_desc))
               <textarea class="form-control" name="product2_desc" rows="4"  name="product2_desc">{{$value->product2_desc}}</textarea>
              @else
              <textarea class="form-control" rows="4" placeholder="Enter ..." name="product2_desc"></textarea>
              @endif
          </div>
          <hr>
          <div class="form-group">
            <label for="">Nhập Icon3</label>
            @if($value != null && isset($value->product3_icon))
             @include('admin.component.image_button', ['name' => 'product3_icon', 'id' => 'product3-icon', 'value' => $value->product3_icon, 'holder' => 'product3-icon-holder','holder_img' => $value->product3_icon])
            @else
             @include('admin.component.image_button', ['name' => 'product3_icon', 'id' => 'product3-icon', 'value' => '', 'holder' => 'product3-icon-holder'])
            @endif
          </div>
          <div class="form-group">
            <label for="">Nhập mô tả 3</label>
              @if($value != null && isset($value->product3_desc))
               <textarea class="form-control" name="product3_desc" rows="4"  name="product3_desc">{{$value->product3_desc}}</textarea>
              @else
              <textarea class="form-control" rows="4" placeholder="Enter ..." name="product3_desc"></textarea>
              @endif
          </div>
          <hr>
          <div class="form-group">
            <label for="">Nhập Icon4</label>
            @if($value != null && isset($value->product4_icon))
             @include('admin.component.image_button', ['name' => 'product4_icon', 'id' => 'product4-icon', 'value' => $value->product4_icon, 'holder' => 'product4-icon-holder','holder_img' => $value->product4_icon])
            @else
             @include('admin.component.image_button', ['name' => 'product4_icon', 'id' => 'product4-icon', 'value' => '', 'holder' => 'product4-icon-holder'])
            @endif
          </div>
          <div class="form-group">
            <label for="">Nhập mô tả 4</label>
              @if($value != null && isset($value->product4_desc))
               <textarea class="form-control" name="product4_desc" rows="4"  name="product4_desc">{{$value->product4_desc}}</textarea>
              @else
              <textarea class="form-control" rows="4" placeholder="Enter ..." name="product4_desc"></textarea>
              @endif
          </div>
        </div>
        <div class="tab-pane" id="tab_2">
          <div class="form-group">
            <label for="">Nội dung phí ship</label>
              @if($value != null && isset($value->ship_product))
               <textarea class="form-control" name="ship_product" rows="4"  name="ship_product">{{$value->ship_product}}</textarea>
              @else
              <textarea class="form-control" rows="4" placeholder="Enter ..." name="ship_product"></textarea>
              @endif
          </div>
        </div>
        <div class="tab-pane" id="tab_3">
          <div class="form-group">
            <label for="">Nội dung đổi trả</label>
              @if($value != null && isset($value->refund_product))
               <textarea class="form-control" name="refund_product" rows="4"  name="refund_product">{{$value->refund_product}}</textarea>
              @else
              <textarea class="form-control" rows="4" placeholder="Enter ..." name="refund_product"></textarea>
              @endif
          </div>
        </div>
      </div>
    </div>
</div> {{-- end --}}