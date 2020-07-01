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
                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                        style="position: relative;"><input class="input" type="checkbox" data-id="2"
                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                            class="iCheck-helper"
                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                    </div>
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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>