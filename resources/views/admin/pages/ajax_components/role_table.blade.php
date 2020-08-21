<section id="pjax-container" class="table-list">
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Slug</th>
                    <th>Name</th>
                    <th>Permission</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr id="role-{{$role->id}}">
                    <td>
                        <input class="input table-checkbox " type="checkbox" class="grid-row-checkbox" data-id="{{ $role->id }}">
                    </td>
                    <td>{{$role->id}}</td>
                    <td>Chua lam</td>
                    <td>{{$role->name}}</td>
                    <td>
                        @foreach ($role->permissions as $permission)
                            <span class="label label-success">{{$permission->name}}</span> 
                        @endforeach
                     </td>
                    <td>2020-03-23 22:39:22</td>
                    <td></td>
                    <td>
                        <a href="{{route('admin.role.edit', $role->id)}}"><span title="Edit"
                                type="button" class="btn btn-flat btn-primary"><i
                                    class="fa fa-edit"></i></span></a>&nbsp;
                        <span onclick="deleteItem({{$role->id}});" title="Delete" class="btn btn-flat btn-danger"><i
                                class="fa fa-trash"></i></span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="box-footer clearfix">
        @include('admin.component.pagination_bar', ['paginator' => $paginator])

    </div>
</section>