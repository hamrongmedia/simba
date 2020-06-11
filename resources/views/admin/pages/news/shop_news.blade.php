@extends('admin.layout')

@section('main')
<div class="row">
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tạo mới một Blog/News</h3>
            </div>
         <!-- form start -->
            <div class="box-body">   
                <form action="" method="post" accept-charset="UTF-8" class="" id="form-main"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" class="form-control" placeholder="Nhập tiêu đề">
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea class="form-control" rows="3" placeholder="Nhập mô tả ngắn"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                            <input type="checkbox">
                            Nổi bật?
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <form>
                            <textarea id="editor1"  name="editor1" rows="10" cols="80">
                               
                            </textarea>
                        </form>
                    </div>
                </form>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tối ưu hoá bộ máy tìm kiếm (SEO)</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            
            <div class="box-body">
                <p>Thiết lập các thẻ mô tả giúp người dùng dễ dàng tìm thấy trên công cụ tìm kiếm như Google.</p>
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" class="form-control" placeholder="Nhập tiêu đề">
                </div>
                <div class="form-group">
                    <label>Mô Tả</label>
                    <textarea class="form-control" rows="3" placeholder="Nhập mô tả ngắn"></textarea>
                </div>
            </div>
        </div> 
    </div>
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Đăng</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control">
                        <option>Đã đăng</option>
                        <option>Bản nhá<p></p></option>
                    </select>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-default">Hủy</button>
                <button type="submit" class="btn btn-info pull-right">Đăng</button>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Chuyên Mục</h3>
            </div>
            <div class="box-body">
                
            </div>
        </div> 
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Hình ảnh</h3>
            </div>
        </div> 
    </div>
</div>

@endsection

@push('styles')

@endpush

@push('scripts')
@include('admin.component.ckeditor_js')

<script type="text/javascript">
    $(document).ready(function() {
    $('.select2').select2()
});

</script>
@endpush