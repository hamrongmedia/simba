<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Ngày gửi</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if ($productQuestions->isNotEmpty())
                @foreach ($productQuestions as $productQuestion)
                <tr  id="product-question-{{$productQuestion->id ?? 1}}">
                    <td>
                        <input class="input" type="checkbox" class="grid-row-checkbox" data-id="{{ $productQuestion->id ?? '1' }}">
                    </td>
                    <td>{{$productQuestion->id ?? ''}}</td>
                    <td>{{$productQuestion->user_name?? 'Khách lạ'}}</td>
                    <td>
                        {{$productQuestion->create_at ?? ''}}
                    </td>
                    <td>{{$productQuestion->status == 1 ? 'Đã duyệt' : 'Chưa duyệt'}}</td>
                    <td>
                        <a href="{{route('admin.product_question.edit', $productQuestion->id ?? '1')}}"><span title="Edit"
                                type="button" class="btn btn-flat btn-primary"><i
                                    class="fa fa-edit"></i></span></a>&nbsp;
                        <span onclick="deleteItem({{$productQuestion->id ?? '1'}});" title="Delete" class="btn btn-flat btn-danger"><i
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
                        Không có thư nào!
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