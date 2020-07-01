@extends('admin.layout')

@section('title')
  Quản lý quyền
@endsection

@section('main')

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="pull-right">
                </div>
                <div class="pull-left">
                </div>
                <!-- /.box-tools -->
            </div>
            <div class="box-header with-border">
                <div class="pull-right">
                    <div class="menu-right">
                            <a href="{{route('admin.permission.create')}}" class="btn  btn-success  btn-flat"
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
                {{-- <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Slug</th>
                                <th>Name</th>
                                <th>Action</th>
                                <th>Updated at</th>
                                <th>CRUD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr id='permission-{{$permission->id}}'>
                                <td>
                                    <input class="input" type="checkbox" class="grid-row-checkbox" data-id="{{ $tr['id']??'' }}">
                                </td>
                                <td>{{$permission->id ?? ''}}</td>
                                <td>Add later</td>
                                <td>{{$permission->name ?? ''}}</td>
                                <td>
                                    @foreach ($permission->actions as $action)
                                    <code>{{$action->name ?? ''}}</code>
                                    @endforeach
                                </td>
                                <td></td>
                                <td>
                                    <a href="{{route('admin.permission.edit', ['id' => $permission->id])}}"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem({{$permission->id}});" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    @include('admin.pages.ajax_components.permission_table')

                </div> --}}
                @include('admin.pages.ajax_components.permission_table')

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
        })

        function deleteAjax(id) {
            $.ajax({
                url: "{{route('admin.permission.delete')}}",
                type: 'POST',
                data: {
                    id: id
                }
            }).done(function(){
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                );
                $('#permission-'+ id).remove();
            })
        }   

        function searchAjax(){
            var input = $('#search_input').val();
            $.ajax({
                url: "" ,
                data:{
                    keyword: input,
                }
            }).done(function (result) {
                $('.table-list').html(result);
            })
        }   

        function sortAjax(current_page){
            var input = $('#order_sort option:selected').val().split('__');
            
            $.ajax({
                url: "{{route('admin.permission.index')}}" ,
                data:{
                    sort_field: input[0],
                    sort_type: input[1],
                    current_page: current_page,
                }
            })
            .done(function (result) {
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

        $('#button_sort').on('click', function(e){
            sortAjax(1);
        });
        
    function getDataPaginate(item, type){
        console.log(item.textContent);
        var type = type;
        let nextPage = item.textContent;
        sortAjax(nextPage);
    };
</script>
@endsection