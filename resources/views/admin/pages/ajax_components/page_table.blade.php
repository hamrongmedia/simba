<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Tên trang</th>
                <th>Đường dẫn</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if ($data->isNotEmpty())
                @foreach ($data as $page)
                <tr  id="page-{{$page->id}}">
                    <td>
                        <input class="input table-checkbox" type="checkbox" class="grid-row-checkbox" data-id="{{ $page->id }}">
                    </td>
                    <td>{{$page->id}}</td>
                    <td><a href="{{route('page.detail', $page->slug)}}" target="_blank">{{$page->title}}</a></td>
                    <td>{{$page->slug}}</td>
                    <td>
                        @if ($page->status == 1)
                        <span class="label label-success">Đang sử dụng</span></a>
                        @else
                        <span class="label label-danger">Ngừng sử dụng</span></a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.page.edit', $page->id)}}"><span title="Edit"
                                type="button" class="btn btn-flat btn-primary"><i
                                    class="fa fa-edit"></i></span></a>&nbsp;
                        <span onclick="deleteItem({{$page->id}});" title="Delete" class="btn btn-flat btn-danger"><i
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