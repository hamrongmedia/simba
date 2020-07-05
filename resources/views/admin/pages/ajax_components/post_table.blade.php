<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Tên bài viết</th>
                <th>Đường dẫn</th>
                <th>Ảnh</th>
                <th>Chuyên mục</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if ($data->isNotEmpty())
                @foreach ($data as $post)
                <tr  id="post-{{$post->id}}">
                    <td>
                        <input class="input table-checkbox" type="checkbox" class="grid-row-checkbox" data-id="{{ $post->id }}">
                    </td>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('post.detail', $post->slug)}}" target="_blank">{{$post->title}}</a></td>
                    <td>{{$post->slug}}</td>
                    <td>
                        <img src="{{$post->image}}" style="max-width: 200px;">
                    </td>
                    <td>
                        @foreach ($post->category as $category)
                        <span>{{$category->name}}  </span>
                        @endforeach
                    </td>
                    <td>
                        @if ($post->status == 1)
                        <span class="label label-success">Đang sử dụng</span></a>
                        @else
                        <span class="label label-danger">Ngừng sử dụng</span></a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.post.edit', $post->id)}}"><span title="Edit"
                                type="button" class="btn btn-flat btn-primary"><i
                                    class="fa fa-edit"></i></span></a>&nbsp;
                        <span onclick="deleteItem({{$post->id}});" title="Delete" class="btn btn-flat btn-danger"><i
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