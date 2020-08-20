<div id="social_setting" class="tab-pane active">
    <h3 class="box-title">{{$page_name}}</h3>
    <div class="form-group">
      <label for="">Facebook</label>
      @if($value != null && isset($value->facebook))
       <input type="text" name="facebook" class="form-control" id="" value="{{$value->facebook}}">
      @else
       <input type="text" name="facebook" class="form-control" id="" placeholder="Nhập link">
      @endif
    </div>
    <div class="form-group ">
      <label for="">Instagram</label>
      @if($value != null && isset($value->instagram))
       <input type="text" name="instagram" class="form-control" id="" value="{{$value->instagram}}">
      @else
       <input type="text" name="instagram" class="form-control" id="" placeholder="Nhập link">
      @endif
    </div>
    <div class="form-group">
      <label for="">Youtube</label>
      @if($value != null && isset($value->youtube))
      <input type="text" name="youtube" class="form-control" id="" value="{{$value->youtube}}">
      @else
       <input type="text" name="youtube" class="form-control" id="" placeholder="Nhập link">
      @endif
    </div>
    <div class="form-group">
      <label for="">Zalo</label>
      @if($value != null && isset($value->zalo))
       <input type="text" name="zalo" class="form-control" id="" value="{{$value->zalo}}">
      @else
       <input type="text" name="zalo" class="form-control" id="" placeholder="Nhập link">
      @endif
    </div>
</div> {{-- end --}}