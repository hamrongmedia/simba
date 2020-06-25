@extends('admin.layout')
@section('title')
  Theme options
@endsection

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main')
  <form action="" role="form" >
    <div class="theme-options-setting  box box-primary clearfix">
      <div class="clearfix box-header with-border text-right">
        <button type="button" class="btn btn-primary btn-sm">Save Changes</button>
      </div>
      <div class="clear box-body clearfix">
        <div class="col-md-2 col-sm-3 no-padding">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs tab-in-left">
              <li class="active btn-block" >
                <a data-toggle="tab" href="#home-setting" class="btn-block"><i class="fa fa-home"></i> Cấu hình chung</a>
              </li>
              <li class="btn-block" >
                <a data-toggle="tab" href="#header-setting" class="btn-block"><i class="fa fa-list"></i> Cài đặt Header</a>
              </li>
              <li class="btn-block" >
                <a data-toggle="tab" href="#product-setting" class="btn-block"><i class="fa fa-shopping-cart"></i> Cài đặt sản phẩm</a>
              </li>
              <li class="btn-block" >
                <a data-toggle="tab" href="#post-setting" class="btn-block"><i class="fa fa-building-o"></i> Cài đặt bài viết</a>
              </li>
              <li class="btn-block" >
                <a data-toggle="tab" href="#contact-setting" class="btn-block"><i class="fa fa-phone"></i> Liên hệ</a>
              </li>
              <li class="btn-block" >
                <a data-toggle="tab" href="#general-script" class="btn-block"><i class="fa fa-code"></i> General & Script</a>
              </li>
              <li class="btn-block" >
                <a data-toggle="tab" href="#like-share" class="btn-block"><i class="fa fa-share-alt"></i> Chia sẻ</a>
              </li>
              <li class="btn-block">
                <a data-toggle="tab" href="#footersettings" class="btn-block"><i class="fa fa-download"></i> Cài đặt Footer</a>
              </li>
            </ul>
          </div>
        </div>
        {{-- tab contnet --}}
        <div class="col-md-10 col-sm-9 no-padding">
          <div class="tab-content">
            <div id="home-setting" class="tab-pane fade in active">
                <div class="form-group">
                  <label for="">Nhập Banner</label>
                  <input type="text" name="hrm_logo_theme" class="form-control" id="" placeholder="">
                </div>
            </div> {{-- end --}}
            <div id="header-setting" class="tab-pane fade in">
                <div class="form-group">
                  <label for="">Nhập logo</label>
                  <input type="text" name="hrm_logo_theme" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Nhập Favicon</label>
                  <input type="text" name="hrm_favicon_theme" class="form-control" id="" placeholder="">
                </div>
            </div> {{-- end --}}
            <div id="product-setting" class="tab-pane fade in">
                <h3 class="box-title">Cài đặt sản phẩm</h3>
                <div class="form-group">
                  <label for="">Số sản phẩm hiển thị trên 1 trang</label>
                  <input type="text" name="hrm_cout_product_cat_theme" class="form-control" id="" placeholder="">
                  <span><em class="help-block">Phân trang chuyển mục</em></span>
                </div>
                <div class="form-group">
                  <label for="">Số sản phẩm liên quan</label>
                  <input type="text" name="hrm_cout_product_theme" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Đổi trả</label>
                </div>
                <h3 class="box-title">Chính sách</h3>
                <div class="form-group">
                  <label for="">Nhập chính sách 1</label>
                  <input type="text" name="hrm_images_policy_product_1" class="form-control" id="" placeholder="">
                  <textarea class="form-control" rows="4" placeholder="Enter ..." name="hrm_conten_policy_product_1"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Nhập chính sách 3</label>
                  <input type="text" name="hrm_images_policy_product_2" class="form-control" id="" placeholder="">
                  <textarea class="form-control" rows="4" placeholder="Enter ..." name="hrm_conten_policy_product_2"></textarea>
                </div>
                 <div class="form-group">
                  <label for="">Nhập chính sách 3</label>
                  <input type="text" name="hrm_images_policy_product_3" class="form-control" id="" placeholder="">
                  <textarea class="form-control" rows="4" placeholder="Enter ..." name="hrm_conten_policy_product_3"></textarea>
                </div>
                 <div class="form-group">
                  <label for="">Nhập chính sách 4</label>
                  <input type="text" name="hrm_images_policy_product_4" class="form-control" id="" placeholder="">
                  <textarea class="form-control" rows="4" placeholder="Enter ..." name="hrm_conten_policy_product_4"></textarea>
                </div>
            </div> {{-- end --}}

            <div id="post-setting" class="tab-pane fade in">
                <h3 class="box-title">Cài đặt bài viết</h3>
                <div class="form-group">
                  <label for="">Số bài viết hiển thị trên 1 trang</label>
                  <input type="text" name="hrm_cout_category_theme" class="form-control" id="" placeholder="">
                  <span><em class="help-block">Phân trang chuyển mục</em></span>
                </div>
                <div class="form-group">
                  <label for="">Số bài viết liên quan</label>
                  <input type="text" name="hrm_cout_post_theme" class="form-control" id="" placeholder="">

                </div>
                
            </div> {{-- end --}}

            <div id="contact-setting" class="tab-pane fade">
              <h3 class="box-title">Hotline rung</h3>
              <div class="form-group">
                <label for="">Nhập email</label>
                <input type="text" name="hrm_email_theme" class="form-control" id="" placeholder="">
              </div>
              <div class="form-group">
                <label for="">Nhập số điện thoại</label>
                <input type="text" name="hrm_phone_theme" class="form-control" id="" placeholder="">
              </div>

            </div> {{-- end --}}



            <div id="general-script" class="tab-pane fade">
                <h3 class="box-title">Script</h3>
                <div class="form-group">
                  <label for="">Header code</label>
                  <textarea class="form-control" rows="4" placeholder="Enter ..." name="hrm_header_coder_theme"></textarea>
                  <span><em class="help-block">Nhập mã được chèn vào tiêu đề</em></span>
                </div>
                <div class="form-group">
                  <label for="">Footer code</label>
                  <textarea class="form-control" rows="4" placeholder="Enter ..." name="hrm_footer_coder_theme"></textarea>
                  <span><em class="help-block">Nhập mã được chèn vào chân trang</em></span>
                </div>

            </div> {{-- end --}}

            <div id="like-share" class="tab-pane fade">
                <h3 class="box-title">Mạng xã hội</h3>
                <div class="form-group">
                  <label for="">Facebook</label>
                  <input type="text" name="facebook" class="form-control" id="" placeholder="Nhập link">
                </div>
                <div class="form-group ">
                  <label for="">Instagram</label>
                  <input type="text" name="instagram" class="form-control" id="" placeholder="Nhập link">
                </div>
                <div class="form-group">
                  <label for="">Youtube</label>
                  <input type="text" name="youtube" class="form-control" id="" placeholder="Nhập link">
                </div>
                <div class="form-group">
                  <label for="">Zalo</label>
                  <input type="text" name="zalo" class="form-control" id="" placeholder="Nhập link">
                </div>
            </div> {{-- end --}}

            <div id="footersettings" class="tab-pane fade">
              <h3 class="box-title">Footer</h3>
              <div class="form-group">
                <label for="">Coppyright text</label>
                <textarea class="form-control" rows="4" placeholder="Enter ..." name="hrm_coppyright_theme"></textarea>
              </div>
            </div> {{-- end --}}

          </div>
        </div>
      </div>
      <div class="clearfix box-header box-footer text-right">
        <button type="button" class="btn btn-primary btn-sm">Save Changes</button>
        <input type="hidden" class="" name="" >
      </div>
    </div>
  </form>
@endsection

