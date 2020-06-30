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
<<<<<<< HEAD
    <input id="{{$name ?? ''}}" class="form-control"  type="text" name="{{$name ?? ''}}" value="{{$value ?? ''}}">
=======
    <input id="{{$name ?? ''}}" class="form-control"  type="{{$hidden ?? 'text'}}" name="{{$name ?? ''}}">
>>>>>>> f181fffda5c811fe70abaf4128555d4191bd99da
  </div>
<div id="{{$holder ?? ''}}" style="margin-top:15px;max-height:{{$height ?? '100px'}};">
</div>

@section('js')
<<<<<<< HEAD
    @parent
    <script>
        $("#{{$id ?? 'lfm'}}").filemanager('image',{prefix:"{{env('APP_URl', 'localhost').'/filemanager'}}" });
    </script>
=======
@parent

<script>
      // custom unisharp
  $("#{{$id ?? 'lfm'}}").filemanager('image', {prefix:  "{{config('app.url') .  '/filemanager'}}" });
</script>
>>>>>>> f181fffda5c811fe70abaf4128555d4191bd99da
@endsection

{{-- include vào bất cứ chỗ nào cần; truyền vào tham số 'name' và 'id'
ex: include('admin.component.image_button', ['name' => 'avatar', 'id' => 'btn1']) --}}