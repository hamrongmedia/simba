<div class="box-body table-responsive no-padding">
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
                    <input class="input" type="checkbox" class="grid-row-checkbox" data-id="{{  $permission->id  }}">
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
    
    @include('admin.component.pagination_bar', ['paginator' => $paginator])

</div>

