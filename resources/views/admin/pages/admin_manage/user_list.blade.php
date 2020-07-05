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
                    <div class="menu-right">
                        <form action="{{route('admin.user.search')}}" id="button_search">
                            <div onclick="searchAjax()" class="btn-group pull-right">
                                <a class="btn btn-flat btn-primary" title="Refresh">
                                    <i class="fa  fa-search"></i>
                                </a>
                            </div>
                            <div class="btn-group pull-right">
                                <div class="form-group">
                                    <input type="text" id="search_input" name="query" class="form-control"
                                        placeholder="Search Name, ID or Email" value="">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="pull-left">
                </div>
                <!-- /.box-tools -->
            </div>

            <div class="box-header with-border">
                <div class="pull-right">
                    <div class="menu-right">
                            <a href="{{route('admin.user.create')}}" class="btn  btn-success  btn-flat"
                            title="New" id="button_create_new">
                            <i class="fa fa-plus" title="Add new"></i>
                        </a>
                    </div>
                </div>


                <div class="pull-left">
                    <div class="menu-left">
                        <button type="button" class="btn btn-default grid-select-all"><i
                                class="fa fa-square-o"></i></button>
                    </div>
                    <div class="menu-left">
                        <a class="btn btn-flat btn-danger grid-trash" title="Delete"><i class="fa fa-trash-o"></i></a>
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
                                <option value="username__desc">Name login desc</option>
                                <option value="username__asc">Name login asc</option>
                                <option value="name__desc">Name desc</option>
                                <option value="name__asc">Name asc</option>
                            </select>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-flat btn-primary" title="Sort" id="button_sort">
                                <i class="fa fa-sort-amount-asc"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <section id="pjax-container" class="table-list">
                @include('admin.pages.ajax_components.user_table')

            </section>
            <!-- /.box-body -->
        </div>
    </div>
</div>

@endsection

@section('js')

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