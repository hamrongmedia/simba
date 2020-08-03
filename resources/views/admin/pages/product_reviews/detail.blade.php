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
                <p><strong>Ngày nhận: </strong>{{$review->create_at ?? ''}}</p> 
                <p><strong>Người gửi: </strong>{{$review->customer_name ?? ''}}</p> 
                <p><strong>Email: </strong><a href="mailto:{{$review->customer_email}}">{{$review->customer_email}}</a></p> 
                <p><strong>Số điện thoại: </strong>{{$review->customer_phone}}</p> 
                <p><strong>Đánh giá sản phẩm: </strong>{{$review->star}} <i style="color: yellow" class="fa fa-star" aria-hidden="true"></i></p>
                <p><strong>Nội dung: </strong></p>
                <div style="background: rgb(248,249,250); padding: 10px">
                    {{$review->comment}}
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
                <form action="{{route('admin.product_reviews.reply', $review->id)}}" method="post">
                    @csrf
                    <button class="btn btn-success" type="submit">Trả lời</button>
                    <input type="hidden" name="product_review_id" value="{{$review->id}}">
                    <div class="box-body">
                        <textarea id="editor" class="editor" name="content" rows="10" cols="80">
                            @if ($review->answer)
                                {!!$review->answer->answer!!}
                            @endif
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
                                <input type="checkbox" class="switch-assign" {{$review->status == 1? 'checked' : '' }} name="comment_status">
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
            url: "{{route('admin.product_reviews.status')}}",
            type: 'POST',
            data: {
                status: status,
                review_id: {{$review->id}},
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


    var type = 'sort';

    function deleteAjax(id) {
        $.ajax({
            url: "{{route('admin.product_reviews.delete')}}",
            type: 'POST',
            data: {
                id: id
            }
        }).done(function () {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success',
            );
            $('#product_reviews-' + id).remove();
        })
    }

    function searchAjax(page = 1){
        var input = $('#search_input').val();
        $.ajax({
            url: '{{route("admin.product_reviews.search")}}' ,
            data:{
                keyword: input,
                current_page:page,
            }
        }).done(function (result) {
            type = 'search';
            $('.table-list').html(result);
        })
    }   

    function sortAjax(current_page = 1) {
        var input = $('#order_sort option:selected').val().split('__');

        $.ajax({
            url: "{{route('admin.product_reviews.index')}}",
            data: {
                sort_by: input[0],
                sort_type: input[1],
                current_page: current_page,
            }
        })
            .done(function (result) {
                type = 'sort';
                $('.table-list').html(result);
            })
    }


    function deleteItem(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })
            .then((result) => {
                if (result.value) {
                    deleteAjax(id);
                }
            })
    }

    $('#button_sort').on('click', function (e) {
        sortAjax(1);
    });

    function getDataPaginate(item, type) {
        let nextPage = item.textContent;
        if (type == 'sort') {
            sortAjax(nextPage);
        }
        if (type == 'search') {
            searchAjax(nextPage);
        }
    };

    function multipleDelete() {
        let idList = [];
        console.log(document.querySelectorAll('.table-checkbox'));
        let input = document.querySelectorAll('.table-checkbox:checked').forEach(function (item) {
            idList.push(item.getAttribute('data-id'));
        })

        if (idList.length > 0) {
            console.log(idList)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    idList.forEach(function (id) {
                        deleteAjax(id);
                    })
                }
            })
        }
    }
</script>
@endsection