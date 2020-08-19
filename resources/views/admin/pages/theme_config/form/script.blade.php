<div id="general-script" class="tab-pane active">
  <h3 class="box-title">{{$page_name}}</h3>
  <div class="form-group">
    <label for="">Header Script</label>
    @if($value != null && isset($value->header_script))
     <textarea class="form-control" rows="4"  name="header_script">{{$value->header_script}}</textarea>
    @else
    <textarea class="form-control" rows="4" placeholder="Enter ..." name="header_script"></textarea>
    <span><em class="help-block">Nhập mã được chèn vào tiêu đề</em></span>
    @endif
  </div>
  <div class="form-group">
    <label for="">Footer code</label>
    @if($value != null && isset($value->footer_script))
     <textarea class="form-control" name="footer_script" rows="4" name="footer_script">{{$value->footer_script}}</textarea>
    @else
    <textarea class="form-control" rows="4" placeholder="Enter ..." name="footer_script"></textarea>
    <span><em class="help-block">Nhập mã được chèn vào chân trang</em></span>
    @endif
  </div>
</div> {{-- end --}}