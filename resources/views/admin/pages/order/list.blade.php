@extends('admin.layout')

@section('title')
  Quản lý User
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="pull-right">
                    {{-- <div class="menu-right">
                            <a href="{{route('admin.user.create')}}" class="btn  btn-success  btn-flat"
                            title="New" id="button_create_new">
                            <i class="fa fa-plus" title="Add new"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
            <!-- /.box-header -->
            <section id="pjax-container" class="table-list" style="padding:20px">
                @include('admin.pages.order.table')
            </section>
            <!-- /.box-body -->
        </div>
    </div>
</div>

@endsection

@section('js')

<script>

function deleteAjax(url, id){
    $.ajax({
        type:'post',
        url: url,
        data:{
            id: id,
        },
        success: function(data){
            swalToast(data.success);
        },
        error: function(error){
            swalToast('Lỗi phía server!', 'error');
        }
    })
}


  function deleteItem(id) {
    Swal.fire({
        title: 'Xóa đơn hàng?',
        text: "Bạn không thể hoàn tác!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Vẫn xóa nó'
    })
    .then((result) => {
        if (result.value) {
            deleteAjax(url,id);
            location.reload();
        }
    })
  }

</script>
@endsection