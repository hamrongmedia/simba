<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Ngày gửi</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($users as $user)
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
            @endforeach --}}
            
        </tbody>
    </table>
</div>
<div class="box-footer clearfix">
    {{-- @include('admin.component.pagination_bar', ['paginator' => $paginator]) --}}

</div>