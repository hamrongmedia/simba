<div id="header-setting" class="tab-pane active">
    <h3 class="box-title">{{$page_name}}</h3>
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Section 1</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Section 2</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Section 3</a></li>
        <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Section 4</a></li>
        <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Section 5</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="form-group">
              <label for="">Nhập ảnh Background</label>
              @if($value != null && isset($value->home1_background))
                @include('admin.component.image_button', ['name' => 'home1_background', 'id' => 'logo-btn', 'value' => $value->home1_background, 'holder' => 'home1_background','holder_img' => $value->home1_background])
              @else
                @include('admin.component.image_button', ['name' => 'home1_background', 'id' => 'logo-btn', 'value' => '', 'holder' => 'home1_background'])
              @endif
            </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
            <div class="form-group">
              <label for="">Nhập tiêu đề 1</label>
              @if($value != null && isset($value->home2_title1))
                <input type="text" name="home2_title1" class="form-control" id="" value="{{$value->home2_title1}}">
              @else
                <input type="text" name="home2_title1" class="form-control" id="" placeholder="">
              @endif 
            </div>
              <div class="form-group">
              <label for="">Nhập ảnh </label>
              @if($value != null && isset($value->home2_background1))
                @include('admin.component.image_button', ['name' => 'home2_background1', 'id' => 'logo-btn', 'value' => $value->home2_background1, 'holder' => 'home2_background1','holder_img' => $value->home2_background1])
              @else
                @include('admin.component.image_button', ['name' => 'home2_background1', 'id' => 'logo-btn', 'value' => '', 'holder' => 'home2_background1'])
              @endif
            </div>
            <div class="form-group">
              <label for="">Nhập mô tả </label>
              @if($value != null && isset($value->home2_desc1))
               <textarea class="form-control" name="home2_desc1" rows="4" name="home2_desc1">{{$value->home2_desc1}}</textarea>
              @else
              <textarea class="form-control" rows="4" placeholder="Enter ..." name="home2_desc1"></textarea>
              @endif
            </div>
            <hr>
            <div class="form-group">
              <label for="">Nhập tiêu đề 2</label>
              @if($value != null && isset($value->home2_title2))
                <input type="text" name="home2_title2" class="form-control" id="" value="{{$value->home2_title2}}">
              @else
                <input type="text" name="home2_title2" class="form-control" id="" placeholder="">
              @endif 
            </div>
            <div class="form-group">
                <label for="">Nhập ảnh </label>
                @if($value != null && isset($value->home2_background2))
                  @include('admin.component.image_button', ['name' => 'home2_background2', 'id' => 'logo-btn', 'value' => $value->home2_background2, 'holder' => 'logo-holder','holder_img' => $value->home2_background2])
                @else
                  @include('admin.component.image_button', ['name' => 'home2_background2', 'id' => 'logo-btn', 'value' => '', 'holder' => 'logo-holder'])
                @endif
            </div>
            <div class="form-group">
              <label for="">Nhập mô tả </label>
              @if($value != null && isset($value->home2_desc2))
               <textarea class="form-control" name="home2_desc2" rows="4"  name="home2_desc2">{{$value->home2_desc2}}</textarea>
              @else
              <textarea class="form-control" rows="4" placeholder="Enter ..." name="home2_desc2"></textarea>
              @endif
            </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
            <div class="form-group">
                <label for="">Nhập ảnh background </label>
                @if($value != null && isset($value->home3_background))
                  @include('admin.component.image_button', ['name' => 'home3_background', 'id' => 'logo-btn', 'value' => $value->home3_background, 'holder' => 'logo-holder','holder_img' => $value->home3_background])
                @else
                  @include('admin.component.image_button', ['name' => 'home3_background', 'id' => 'logo-btn', 'value' => '', 'holder' => 'logo-holder'])
                @endif
            </div>
            <div class="form-group">
              <label for="">Nhập mô tả </label>
              @if($value != null && isset($value->home3_desc))
               <textarea class="form-control" name="home3_desc" rows="4" name="home3_desc">{{$value->home3_desc}}</textarea>
              @else
              <textarea class="form-control" rows="4" placeholder="Enter ..." name="home3_desc"></textarea>
              @endif
            </div>
        </div>
        <div class="tab-pane" id="tab_3">
            <div class="form-group">
              <label for="">Nhập mô tả 1 </label>
              @if($value != null && isset($value->home4_desc1))
               <textarea class="form-control" name="home4_desc1" rows="4" name="home4_desc1">{{$value->home4_desc1}}</textarea>
              @else
              <textarea class="form-control" rows="4" placeholder="Enter ..." name="home4_desc1"></textarea>
              @endif
            </div>
            <div class="form-group">
              <label for="">Nhập mô tả 2 </label>
              @if($value != null && isset($value->home4_desc2))
               <textarea class="form-control" name="home4_desc1" rows="4" name="home4_desc2">{{$value->home4_desc2}}</textarea>
              @else
              <textarea class="form-control" rows="4" placeholder="Enter ..." name="home4_desc2"></textarea>
              @endif
            </div>
            <div class="form-group">
              <label for="">Nhập mô tả 3 </label>
              @if($value != null && isset($value->home4_desc3))
               <textarea class="form-control" name="home4_desc3" rows="4" name="home4_desc3">{{$value->home4_desc3}}</textarea>
              @else
              <textarea class="form-control" rows="4" placeholder="Enter ..." name="home4_desc3"></textarea>
              @endif
            </div>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
</div> {{-- end --}}