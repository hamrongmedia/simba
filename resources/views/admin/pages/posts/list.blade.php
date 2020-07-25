@extends('admin.layout')
@section('title')
  Quản lý bài viết
@endsection
@section('css')
{{-- Datatable --}}
<link rel="stylesheet" href="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('main')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body">

      <div class="box-header with-border">
          <div class="pull-right">
              <div class="menu-right">
                      <a href="{{route('admin.post.create')}}" class="btn  btn-success  btn-flat"
                      title="New" id="button_create_new">
                      <i class="fa fa-plus" title="Add new"></i>
                  </a>
              </div>
          </div>
          {{-- <div class="pull-left">
              <div class="menu-left">
                  <button type="button" class="btn btn-default grid-select-all"><i
                          class="fa fa-square-o"></i></button>
              </div>
              <div class="menu-left">
                  <a class="btn btn-flat btn-danger grid-trash"  onclick="multipleDelete()" title="Delete"><i class="fa fa-trash-o"></i></a>
              </div>

              <div class="menu-left">
                  <a class="btn btn-flat btn-primary grid-refresh" title="Refresh"><i
                          class="fa fa-refresh"></i></a>
              </div>

              <div class="menu-left">
                  <div class="btn-group">
                      <select class="form-control" id="order_sort">
                          <option value="id__desc">ID desc</option>
                          <option value="id__asc">ID asc</option>
                          <option value="title__desc">Tiêu đề giảm dần</option>
                          <option value="title__asc">Tiêu đề tăng đân</option>
                          <option value="slug__desc">Name desc</option>
                          <option value="slug__asc">Name asc</option>
                      </select>
                  </div>
                  <div class="btn-group">
                      <a class="btn btn-flat btn-primary" title="Sort" id="button_sort">
                          <i class="fa fa-sort-amount-asc"></i>
                      </a>
                  </div>
              </div>
          </div> --}}
 
      </div>
      <section id="pjax-container" class="table-list">
        {{-- @include('admin.pages.ajax_components.post_table') --}}
        @include('admin.pages.posts.table')
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
<script src="{{ asset('template/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>

$(function () {
    $("#posts-table").dataTable({
        processing: true,
        serverSide: true,
        responsive:true,
        autoWidth:false,
        scrollX: true,

        ajax: "{{route('admin.post.list_post')}}",
        columns: [
            { "data": "id" },
            { "data": "title" },
            { "data": "slug" },
            { "data": "categories" },
            { "data" :"image"},
            { "data" :"status"},
            { "data" :"action"},

        ]
        });
    });

    
  var type = 'sort';

  function deleteAjax(id) {
      $.ajax({
          url: "{{route('admin.post.delete')}}",
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
          $('#post-' + id).remove();
      })
  }

  function searchAjax(page = 1){
      var input = $('#search_input').val();
      $.ajax({
          url: '{{route("admin.post.search")}}' ,
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
          url: "{{route('admin.post.index')}}",
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