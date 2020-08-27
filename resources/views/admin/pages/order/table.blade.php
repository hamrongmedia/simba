@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

<table id="order-table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Tổng thanh toán</th>
            <th>Phí vận chuyển</th>
            <th>Phương thức thanh toán</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
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
            $("#order-table").dataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: false,
                order: [[ 0, "desc" ]],
                scrollX: true,
                ajax: "{{route('admin.order.list_order')}}",
                order: [[ 0, "desc" ]],
                columns: [
                    { "data": "DT_RowIndex","name": 'id' , "searchable": false},
                    { "data": "email" },
                    { "data": "payment_total" },
                    { "data": "delivery_fee_total"},
                    { "data": "payment_method", 'name': 'paymentMethod.name' },
                    { "data": "status", 'name': 'order' },
                    { "data": "created_at" },
                    { "data": "action" },
                ]
            });
        });
    </script>
@endsection