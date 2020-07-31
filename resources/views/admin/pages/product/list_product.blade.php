@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

<table id="product-table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Thao tác</th>
        </tr>
    </thead>
</table>  

@section('js')
    @parent
    <script src="{{ asset('template/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $("#product-table").dataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                columnDefs:[
                    {width: 200, "target": 1}
                ],
                ajax: "{{route('admin.product.table_ajax')}}",
                columns: [
                    { "data": "id" },
                    { "data": "image", "width": "100px" },
                    { "data": "name" },
                    { "data": "categories", "name": "categories.name" },
                    { "data": "price" },
                    { "data": "action" },
                ],
                
            });
        });
    </script>
@endsection