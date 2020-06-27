<section id="pjax-container" class="table-list">
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
                        <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                            style="position: relative;"><input class="input" type="checkbox" data-id="3"
                                style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                class="iCheck-helper"
                                style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                        </div>
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
        Showing <b>1</b> to <b>16</b> of <b>16</b> items
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