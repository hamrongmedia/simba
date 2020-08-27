@extends('admin.layout')

@section('title')
  Chi tiết tin nhắn
@endsection

@section('main')
<div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="box-header with-border">
                <strong>Nội dung tin nhắn</strong>
                <!-- /.box-tools -->
            </div>
            <div class="box-body">
                <strong>Thông tin sản phẩm đánh giá</strong>
                <hr>
            <!-- /Thông tin sp -->
                @foreach($product as $sanpham)
                    <img width="200px" src="{{$sanpham->thumbnail}}"> 
                    <br><br>
                    <p><strong>Tên sản phẩm : </strong>{{$sanpham->name}}</p> 
                    <p><strong>Giá : </strong>{{$sanpham->price}} <sup>đ</sup></p> 
                    <a href="{{route('product.detail', $sanpham->slug) }}">Xem chi tiết sản phẩm</a>
                @endforeach
            </div>
            <hr>
            <div class="box-body">
                <p><strong>Ngày nhận: </strong>{{$question->timestamp ?? ''}}</p> 
                <p><strong>người gửi: </strong>{{$question->user_name ?? ''}}</p> 
                <p><strong>Nội dung: </strong></p>
                <div style="background: rgb(248,249,250); padding: 10px">
                    {{$question->question_content}}
                </div>
            </div>
            <!-- /.box-header -->

            <!-- /.box-body -->
        </div>

        <div class="box">
            <div class="box-header with-border">
                <strong>Phản hồi</strong>

                <!-- /.box-tools -->
            </div>
            <div class="box-body">
                <form action="{{route('admin.product_question.reply', $question->id)}}" method="post">
                    @csrf
                    <button class="btn btn-success" type="submit">Trả lời</button>
                    <input type="hidden" name="question_id" value="{{$question->id}}">
                    <div class="box-body">
                        <textarea id="editor" class="editor" name="answer" rows="10" cols="80">
                            @foreach($reply as $reply)
                                {!!$reply->answer!!}
                            @endforeach
                        </textarea>
                        @error('content')
                            <strong class="text-red">
                                {{$message}}
                            </strong>
                        @enderror
                    </div>
                </form> 
            </div>
            <!-- /.box-header -->

            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-3">
        <div class="box">
            <div class="box-header with-border">
                    <strong>Trạng thái comment</strong>
                    <div class="form-group" style="margin-top:20px">
                        <div class="assign-switch">
                            <label class="switch-label">
                                <input type="checkbox" class="switch-assign" {{$question->status == 1? 'checked' : '' }} name="comment_status">
                                <span class="slider round"></span>
                            </label>
                            <label class="d-inline-block">Công khai / Ẩn</label>
                        </div>
                    </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('js')

@include('admin.component.ckeditor_js');
<script>

$('.switch-assign').on('change', function(){

    if($('.switch-assign').is(':checked')){
        var status = 'on';
    }
    else{
        var status = 'off';
    }

    $.ajax({
        url: "{{route('admin.product_question.status')}}",
        type: 'POST',
        data: {
            status: status,
            question_id: {{$question->id}},
        } 
    }).done(function(data){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'success',
            title: data.msg,
        })
    })
})

</script>
@endsection