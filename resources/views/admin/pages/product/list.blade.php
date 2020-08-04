@extends('admin.layout')
@section('title')
  Quản lý sản phẩm
@endsection

@section('main')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body">
        <div class="box-header with-border">
          <div class="pull-left">
          </div>
          <!-- /.box-tools -->
      </div>
      <div class="box-header with-border">
          <div class="pull-right">
              <div class="menu-right">
                      <a href="{{route('admin.product.create')}}" class="btn  btn-success  btn-flat"
                      title="New" id="button_create_new">
                      <i class="fa fa-plus" title="Add new"></i>
                  </a>
              </div>
          </div>
      </div>
        <section id="pjax-container" class="table-list">
        
        @include('admin.pages.product.list_product');

      </section>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
@endsection
@section('js')
<script>
  var type = 'sort';

  function deleteAjax(id) {
      $.ajax({
          url: "{{ route("admin.ajax.destroy") }}",
          type: 'POST',
          data: {
              id: id,
              model: 'product',
              _method: 'delete',
          }
      }).done(function () {
          Swal.fire(
              'Xóa sản phẩm!',
              'Bạn đã xóa sản phẩm thành công.',
              'success',
          );
          $('#product-' + id).remove();
      })
  }

  function deleteItem(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn muốn xóa sản phẩm này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy bỏ'
    })
    .then((result) => {
        if (result.value) {
            deleteAjax(id);
        }
    })
  }

  function restoreItem( id, model, url, title= 'Are You Sure?') {
    swal({
      title: title,
      text: text,
      type: "question",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      closeOnConfirm: false,
      confirmButtonText: "Ok",
      showLoaderOnConfirm: false,
      cancelButtonText: "Cancel",
      preConfirm: function() {
        return new Promise(function(resolve) {
          setTimeout(function () {
            $.ajax({
              method: 'post',
              url: url,
              data: {
                id: id,
                model: model,
                _token: $('meta[name="csrf-token"]').attr('content')
              },
              dataType: 'json',
              success: function (data) {
                if(data.status) {
                  swal( 'Success!',data.msg,'success' );
                  location.reload();
                }
              }
            });
          }, 2000);
        });
      }
    }).then(function(result) {
          swal( 'Error!',data.msg,'error' );
    });
  }


  function multipleDelete() {
      let idList = [];
      let input = document.querySelectorAll('.table-checkbox:checked').forEach(function (item) {
          idList.push(item.getAttribute('data-id'));
      })

      if (idList.length > 0) {
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