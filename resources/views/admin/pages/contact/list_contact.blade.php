@extends('admin.layout')

@section('title')
  Quản lý Contact
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="pull-right">
                    <div class="menu-right">
                        <form action="{{route('admin.contact.search')}}" id="button_search">
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
                                <option value="customer_name__desc">Tên khách hàng giảm dần</option>
                                <option value="customer_name__asc">Tên khách hàng tăng dần</option>
                                <option value="email__desc">Email tăng</option>
                                <option value="email__asc">Email giảm</option>
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
                 @include('admin.pages.ajax_components.contact_table')

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
            url: "{{route('admin.contact.delete')}}",
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
            console.log($('#contact-' + id));
            $('#contact-' + id).remove();
        })
    }

    function searchAjax(page = 1){
        var input = $('#search_input').val();
        $.ajax({
            url: '{{route("admin.contact.search")}}' ,
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
            url: "{{route('admin.contact.index')}}",
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