@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

<table id="category-table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Họ và tên</th>
            <th>Vị trí</th>
            <th>Quyền</th>
            <th>Hành động</th>
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

                ajax: "{{route('admin.user.list_users')}}",
                columns: [
                    { "data": "id" },
                    { "data": "username" },
                    { "data": "name" },
                    { "data": "roles" },
                    { "data": "permissions" },
                    { "data": "action" },
                ]
            });
        });
    </script>
@endsection