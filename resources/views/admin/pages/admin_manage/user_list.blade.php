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
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>User name</th>
                                <th>Full name</th>
                                <th>Roles</th>
                                <th>Permission</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    <input class="input" type="checkbox" class="grid-row-checkbox" data-id="{{ $user->id }}">
                                </td>
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->name}}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="label label-success">{{$role->name}}</span> 
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user->permissions as $permission)
                                        <span class="label label-success">{{$permission->name}}</span> 
                                    @endforeach
                                </td>
                                <td>2020-03-23 22:39:57</td>
                                <td>
                                    <a href="{{route('admin.user.edit', $user->id)}}"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem({{$user->id}});" title="Delete" class="btn btn-flat btn-danger"><i
                                        class="fa fa-trash"></i></span></td>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    Showing <b>1</b> to <b>2</b> of <b>2</b> items
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <!-- Previous Page Link -->
                        <li class="page-item disabled"><span class="page-link pjax-container">«</span></li>

                        <!-- Pagination Elements -->
                        <!-- "Three Dots" Separator -->

                        <!-- Array Of Links -->
                        <li class="page-item active"><span class="page-link pjax-container">1</span></li>

                        <!-- Next Page Link -->
                        <li class="page-item disabled"><span class="page-link pjax-container">»</span></li>
                    </ul>

                </div>
            </section>
            <!-- /.box-body -->
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    function sortAjax(){
        var input = $('#order_sort option:selected').val().split('__');
        $.ajax({
            url: "{{route('admin.user.index')}}" ,
            data:{
                sort_field: input[0],
                sort_type: input[1],
            }
        }).done(function (result) {
            $('.table-list').html(result);
        })
    }

    function searchAjax(){
        var input = $('#search_input').val();
        $.ajax({
            url: "{{route('admin.user.search')}}" ,
            data:{
                keyword: input,
            }
        }).done(function (result) {
            $('.table-list').html(result);
        })
    }

    $('#button_sort').on('click', function(e){
        sortAjax();
    });

</script>
@endsection