@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

<table id="category-table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Đường dẫn</th>
            <th>Danh mục cha</th>
            <th>Trạng thái </th>
            <th>Thao tác thái</th>
        </tr>
    </thead>
</table>  

@section('js')
    @parent
    <script src="{{ asset('template/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $("#category-table").dataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: false,
                scrollX: true,

                ajax: "{{route('admin.category.list_categories')}}",
                columns: [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "slug" },
                    { "data": "parent", 'name': 'post_category.name' },
                    { "data": "status" },
                    { "data": "action" },

                ]
            });
        });
    </script>
@endsection