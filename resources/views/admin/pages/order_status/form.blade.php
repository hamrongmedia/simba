<div class="box-body">
    <div class="fields-group">
        <div class="form-group   ">
            <label for="name" class="col-sm-2 col-form-label">Tên trạng thái</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                    <input type="text" id="name" name="name" value="{{ isset($data) ? $data->name : old('name') }}" class="form-control name" placeholder="Nhập tên trạng thái">
                </div>
                @if ($errors->first('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                @endif
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="box-footer">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="btn-group pull-right">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        <div class="btn-group pull-left">
            <button type="reset" class="btn btn-warning">Làm mới</button>
        </div>
    </div>
</div>