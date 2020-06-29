@section('css')
    @parent
    <style>
      #{{$holder ?? ''}} img {
        height: 15rem !important;
      }

    </style>
@endsection

<div class="input-group">
    <span class="input-group-btn">
      <a id="{{$id ?? 'lfm'}}" data-input="{{$name ?? ''}}" data-preview="{{$holder ?? ''}}" class="btn btn-primary">
        <i class="fa fa-picture-o"></i> Duyệt ảnh
      </a>
    </span>
    <input id="{{$name ?? ''}}" class="form-control"  type="{{$hidden ?? 'text'}}" name="{{$name ?? ''}}">
  </div>
<div id="{{$holder ?? ''}}" style="margin-top:15px;max-height:{{$height ?? '100px'}};">
</div>

@section('js')
@parent

<script>
      // custom unisharp
  $("#{{$id ?? 'lfm'}}").filemanager('image', {prefix:  "{{env('APP_URL', 'http://simba.vn') .  '/filemanager'}}" });
  //lfm("#{{$id ?? 'lfm'}}", 'image', {prefix:  "{{env('APP_URL', 'http://localhost') .  '/filemanager'}}" }, '10rem');
</script>
@endsection

{{-- include vào bất cứ chỗ nào cần; truyền vào tham số 'name' và 'id'
ex: include('admin.component.image_button', ['name' => 'avatar', 'id' => 'btn1']) --}}