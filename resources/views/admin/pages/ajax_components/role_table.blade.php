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
                        <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                            style="position: relative;"><input class="input" type="checkbox" data-id="6"
                                style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                class="iCheck-helper"
                                style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                        </div>
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
        Showing <b>1</b> to <b>6</b> of <b>6</b> items
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