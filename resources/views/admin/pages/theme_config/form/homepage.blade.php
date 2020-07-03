<div id="header-setting" class="tab-pane active">
    <h3 class="box-title">{{$page_name}}</h3>
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Section 1</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Section 2</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Section 3</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
            Dropdown <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
          </ul>
        </li>
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
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
               <textarea class="form-control" name="home2_desc1" rows="4" value="{{$value->home2_desc1}}" name="home2_desc1"></textarea>
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
               <textarea class="form-control" name="home2_desc2" rows="4" value="{{$value->home2_desc2}}" name="home2_desc2"></textarea>
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
               <textarea class="form-control" name="home3_desc" rows="4" value="{{$value->home3_desc}}" name="home3_desc"></textarea>
              @else
              <textarea class="form-control" rows="4" placeholder="Enter ..." name="home3_desc"></textarea>
              @endif
            </div>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
</div> {{-- end --}}