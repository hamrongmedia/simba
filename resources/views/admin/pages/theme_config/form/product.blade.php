<div id="header-setting" class="tab-pane active">
    <h3 class="box-title">{{$page_name}}</h3>
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
</div> {{-- end --}}