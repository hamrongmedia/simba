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
    <input id="{{$name ?? ''}}" value="{{$value ?? ''}}" class="form-control"  type="{{$hidden ?? 'text'}}" name="{{$name ?? ''}}" >
  </div>
<div id="{{$holder ?? ''}}" style="margin-top:15px;max-height:{{$height ?? '100px'}};">

  @if($value)
    @php
        $holder_list = explode(',', $value);
    @endphp
    @foreach ($holder_list as $item)
      <img src="{{$item}}" style="height: 7rem;">
    @endforeach

  @elseif (isset($holder_img))
    @php
        $holder_list = explode(',', $holder_img);
    @endphp
    @foreach ($holder_list as $item)
      <img src="{{$item}}" style="height: 7rem;">
    @endforeach
  @endif

</div>

@section('js')
@parent

<script>
      // custom unisharp
  $("#{{$id ?? 'lfm'}}").filemanager('image', {prefix:  "/filemanager" });


</script>
@endsection

{{-- include vào bất cứ chỗ nào cần; truyền vào tham số 'name' và 'id'
ex: include('admin.component.image_button', ['name' => 'avatar', 'id' => 'btn1']) --}}