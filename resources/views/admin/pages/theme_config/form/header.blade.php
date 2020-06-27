<div id="header-setting" class="tab-pane active">
    <h3 class="box-title">{{$page_name}}</h3>
    <div class="form-group">
      <label for="">Nhập logo</label>
      {{-- <input type="text" name="hrm_logo_theme" class="form-control" id="" placeholder=""> --}}
      @include('admin.component.image_button', ['name' => 'hrm_logo_theme', 'id' => 'logo-btn', 'value' => '', 'holder' => 'logo-holder'])


    </div>
    <div class="form-group">
      <label for="">Nhập Favicon</label>
      {{-- <input type="text" name="hrm_favicon_theme" class="form-control" id="" placeholder=""> --}}
      @include('admin.component.image_button', ['name' => 'hrm_favicon_theme', 'id' => 'favicon-btn', 'value' => '', 'holder' => 'favicon-holder'])

    </div>
    <div class="form-group">
      <label for="">Nhập Banner</label>
      @include('admin.component.image_button', ['name' => 'hrm_banner_theme', 'id' => 'banner-btn', 'value' => '', 'holder' => 'banner-holder'])      
    </div>
    <div class="form-group">
      <label for="">Nhập email</label>
      <input type="text" name="hrm_email_theme" class="form-control" id="" placeholder="">
    </div>
    <div class="form-group">
      <label for="">Nhập số điện thoại</label>
      <input type="text" name="hrm_phone_theme" class="form-control" id="" placeholder="">
    </div>
</div> {{-- end --}}