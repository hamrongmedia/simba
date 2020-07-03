<div id="header-setting" class="tab-pane active">
    <h3 class="box-title">{{$page_name}}</h3>
    <div class="form-group">
      <label for="">Nhập logo</label>
      @if($value != null && isset($value->logo_setting))
       @include('admin.component.image_button', ['name' => 'logo_setting', 'id' => 'logo-btn', 'value' => $value->logo_setting, 'holder' => 'logo-holder','holder_img' => $value->logo_setting])
      @else
       @include('admin.component.image_button', ['name' => 'logo_setting', 'id' => 'logo-btn', 'value' => '', 'holder' => 'logo-holder'])
      @endif
    </div>
    <div class="form-group">
      <label for="">Nhập Favicon</label>
      @if($value != null && isset($value->favicon_setting))
        @include('admin.component.image_button', ['name' => 'favicon_setting', 'id' => 'favicon-btn', 'value' =>$value->favicon_setting, 'holder' => 'favicon-holder', 'holder_img' => $value->favicon_setting])
      @else
        @include('admin.component.image_button', ['name' => 'favicon_setting', 'id' => 'favicon-btn', 'value' => '', 'holder' => 'favicon-holder'])
      @endif
    </div>
    <div class="form-group">
      <label for="">Nhập Banner</label>
      @if($value != null && isset($value->banner_setting))
        @include('admin.component.image_button', ['name' => 'banner_setting', 'id' => 'banner-btn', 'value' => $value->banner_setting, 'holder' => 'banner-holder', 'holder_img' => $value->banner_setting])
      @else
        @include('admin.component.image_button', ['name' => 'banner_setting', 'id' => 'banner-btn', 'value' => '', 'holder' => 'banner-holder'])
      @endif    
    </div>
    <div class="form-group">
      <label for="">Nhập email</label>
      @if($value != null && isset($value->email_setting))
        <input type="text" name="email_setting" class="form-control" id="" value="{{$value->email_setting}}">
      @else
        <input type="text" name="email_setting" class="form-control" id="" placeholder="">
      @endif 
    </div>
    <div class="form-group">
      <label for="">Nhập số điện thoại</label>
      
      @if($value != null && isset($value->phone_setting))
        <input type="text" name="phone_setting" class="form-control" id="" value="{{$value->phone_setting}}">
      @else
        <input type="text" name="phone_setting" class="form-control" id="" placeholder="">
      @endif
    </div>
</div> {{-- end --}}