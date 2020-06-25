<div class="input-group">
    <span class="input-group-btn">
      <a id="{{$id ?? 'lfm'}}" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
        <i class="fa fa-picture-o"></i> Duyệt ảnh
      </a>
    </span>
    <input id="thumbnail" class="form-control" type="text" name="{{$name ?? ''}}">
  </div>
<img id="holder" style="margin-top:15px;max-height:100px;">

@section('js')
    @parent
    <script>
        $("#{{$id ?? 'lfm'}}").filemanager('image');
    </script>
@endsection

{{-- include vào bất cứ chỗ nào cần; truyền vào tham số 'name' và 'id'
ex: include('admin.component.image_button', ['name' => 'avatar', 'id' => 'btn1']) --}}