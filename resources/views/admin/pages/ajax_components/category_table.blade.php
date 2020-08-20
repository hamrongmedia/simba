<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Đường dẫn</th>
                <th>Danh mục cha</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if ($data->isNotEmpty())
                @foreach ($data as $category)
                <tr  id="category-{{$category->id}}">
                    <td>
                        <input class="input table-checkbox" type="checkbox" class="grid-row-checkbox" data-id="{{ $category->id }}">
                    </td>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('category.listpost', $category->slug)}}" target="_blank">{{$category->name}}</a></td>
                    <td>{{$category->slug}}</td>
                    <td>
                    </td>
                    <td>
                        @if ($category->status == 1)
                        <span class="label label-success">Đang sử dụng</span></a>
                        @else
                        <span class="label label-danger">Ngừng sử dụng</span></a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.category.edit', $category->id)}}"><span title="Edit"
                                type="button" class="btn btn-flat btn-primary"><i
                                    class="fa fa-edit"></i></span></a>&nbsp;
                        <span onclick="deleteItem({{$category->id}});" title="Delete" class="btn btn-flat btn-danger"><i
                            class="fa fa-trash"></i></span></td>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                    </th>
                    <th>
                        Không có bài post nào!
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="box-footer clearfix">
    @include('admin.component.pagination_bar', ['paginator' => $paginator])

</div>