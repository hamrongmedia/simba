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
                <p><strong>Ngày nhận: </strong>{{$contact->create_at}}</p> 
                <p><strong>Người gửi: </strong>{{$contact->customer_name}}</p> 
                <p><strong>Email: </strong><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></p> 
                <p><strong>Số điện thoại: </strong>{{$contact->phone}}</p> 
                <p><strong>Địa chỉ: </strong>{{$contact->address}}</p>
                <p><strong>Tiêu đề: </strong>{{$contact->title}}</p>
                <p><strong>Nội dung: </strong></p>
                <div style="background: rgb(248,249,250); padding: 10px">
                    {{$contact->content}}
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
                <form action="{{route('admin.contact.reply', $contact->id)}}" method="post">
                    @csrf
                    <button class="btn btn-success" type="submit">Trả lời</button>

                    <div class="box-body">
                        <textarea id="editor" class="editor" name="content" rows="10" cols="80">
                        </textarea>
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
                    <strong>Trạng thái tin nhắn</strong>
    
                <!-- /.box-tools -->
            </div>

            <!-- /.box-header -->

            <!-- /.box-body -->
        </div>
    </div>
</div>

@endsection

@section('js')

@include('admin.component.ckeditor_js');
<script>
    var type = 'sort';

    function deleteAjax(id) {
        $.ajax({
            url: "{{route('admin.user.delete')}}",
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
            $('#user-' + id).remove();
        })
    }

    function searchAjax(page = 1){
        var input = $('#search_input').val();
        $.ajax({
            url: '{{route("admin.user.search")}}' ,
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
            url: "{{route('admin.user.index')}}",
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