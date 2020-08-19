@extends('admin.layout')

@section('title')
  Quản lý User
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap-editable.css')}}">
@endsection

@section('main')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Chi tiết đơn hàng #{{ $order->order_code }}</h3>
                        <div class="box-tools not-print">
                            <div class="btn-group pull-right" style="margin-right: 0px">
                                <a href="{{ route('admin.order.index') }}"
                                    class="btn btn-sm btn-flat btn-default"><i
                                        class="fa fa-list"></i>&nbsp;List</a>
                            </div>

                            <div class="btn-group pull-right"
                                style="margin-right: 10px;border:1px solid #c5b5b5;">
                                <a class="btn btn-sm btn-flat" title="Export" onclick="order_print()"><i
                                        class="fa fa-print"></i><span class="hidden-xs"> Print</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="order-body">
                        <div class="col-sm-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="td-title">Họ tên:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="fullname"
                                            data-type="text" data-pk="300"
                                            data-url="{{route('admin.order.update',['id'=>$order->id])}}"
                                            data-title="Last name">{{ $order->fullname }}</a></td>
                                </tr>                                

                                <tr>
                                    <td class="td-title">Số điện thoại:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="phone"
                                            data-type="text" data-pk="300"
                                            data-url="{{route('admin.order.update',['id'=>$order->id])}}"
                                            data-title="Phone">{{ $order->phone }}</a></td>
                                </tr>

                                <tr>
                                    <td class="td-title">Email:</td>
                                    <td>{{ $order->email }}</td>
                                </tr>
                                <tr>
                                    <td class="td-title">Tỉnh thành:</td>
                                    <td>{{ $order->province->name }}</td>
                                </tr>
                                <tr>
                                    <td class="td-title">Quận huyện:</td>
                                    <td>{{ $order->district->name }}</td>
                                </tr>
                                <tr>
                                    <td class="td-title">Phường xã:</td>
                                    <td>{{ $order->ward->name }}</td>
                                </tr>
                                <tr>
                                    <td class="td-title">Địa chỉ:</td>
                                    <td>
                                        <a href="#" class="updateInfoRequired" 
                                            data-name="address"
                                            data-type="text" 
                                            data-pk="300"
                                            data-url="{{route('admin.order.update',['id'=>$order->id])}}"
                                            data-title="Address">{{ $order->address }}
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="td-title">Trạng thái đơn hàng:</td>
                                        <td>
                                            <a href="#" class="updateStatus editable editable-click" 
                                                data-name="order_status_id" 
                                                data-type="select" 
                                                data-source="{{ $order_statuss }}" 
                                                data-pk="322" 
                                                data-value="{{ $order->orderStatus->id ?? ''}}" 
                                                data-url="{{route('admin.order.update',['id'=>$order->id])}}" 
                                                data-title="Trạng thái đơn hàng">
                                                {{ $order->orderStatus->name ?? ''}}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Trạng thái vận chuyển:</td>
                                        <td>
                                            <a href="#" class="updateStatus editable editable-click" 
                                                data-name="shipping_status_id" 
                                                data-type="select" 
                                                data-source="{{ $shipping_statuss }}" 
                                                data-pk="322" 
                                                data-value="{{ $order->shippingStatus->id ?? ''}}" 
                                                data-url="{{route('admin.order.update',['id'=>$order->id])}}" 
                                                data-title="Trạng thái vận chuyển">{{ $order->shippingStatus->name ?? ''}}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phương thức thanh toán:</td>
                                        <td>
                                            <a href="#" class="updateStatus editable editable-click" 
                                                data-name="payment_method_id" 
                                                data-type="select" 
                                                data-source="{{ $payment_methods }}" 
                                                data-pk="322" 
                                                data-value="{{ $order->paymentMethod->id ?? ''}}" 
                                                data-url="{{route('admin.order.update',['id'=>$order->id])}}" 
                                                data-title="Phương thức thanh toán">{{ $order->paymentMethod->name ?? ''}}
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <td class="td-title">Ghi chú:</td>
                                    <td>
                                        <a href="#" class="updateInfoRequired editable editable-click" 
                                            data-name="message" 
                                            data-type="text" 
                                            data-pk="322" 
                                            data-value="{{ $order->message ?? ''}}" 
                                            data-url="{{route('admin.order.update',['id'=>$order->id])}}" 
                                            data-title="Ghi chú">{{ $order->message ?? ''}}
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <td class="td-title"><b>Tổng phụ</b>:</td>
                                    <td><b>{{ \App\Helpers\Common::priceFormat($order->total) }} đ</b></td>
                                </tr>
                                <tr>
                                    <td class="td-title"><b>Phí vận chuyển:</b></td>
                                    <td><b>{{ \App\Helpers\Common::priceFormat($order->delivery_fee_total) }} đ</b></td>
                                </tr>
                                <tr>
                                    <td class="td-title"><b>Tổng tiền:</td>
                                    <td><b>{{ \App\Helpers\Common::priceFormat($order->payment_total) }} đ</b></td>
                                </tr>
                            </table>
                        </div>

                    </div>


                    <form id="form-add-item" action="" method="">
                        @csrf
                        <input type="hidden" name="order_id" value="300">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box collapsed-box">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Mã sản phẩm</th>
                                                    <th class="product_price">Giá</th>
                                                    <th class="product_qty">Số lượng</th>
                                                    <th class="product_total">Tổng tiền</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($datas->count()>0)
                                                    @foreach ($datas as $cartItem)
                                                        <tr>
                                                            <td>
                                                                {{ $cartItem->name }}<br>
                                                                @if($cartItem->type == \App\Models\Product::PRODUCT_ATTRIBUTE)
                                                                    <b>Color:</b> {{ $cartItem->pav1_value }} @if($cartItem->pav2_id) &emsp;<b>Size:</b> {{ $cartItem->pav2_value }} @endif
                                                                @endif
                                                            </td>
                                                            <td>{{ $cartItem->product_code }}</td>
                                                            <td class="product_price">
                                                                <a href="#"
                                                                    class="edit-item-detail" 
                                                                    data-value="{{ $cartItem->price }}"
                                                                    data-name="price" 
                                                                    data-type="tel" 
                                                                    min=0
                                                                    data-pk="{{ $cartItem->order_item_id }}"
                                                                    data-url="{{ route('admin.order.item.edit') }}"
                                                                    data-title="Price">
                                                                    {{ \App\Helpers\Common::priceFormat($cartItem->price) }} đ
                                                                </a>
                                                            </td>
                                                            <td class="product_qty">x 
                                                                <a href="#" class="edit-item-detail" 
                                                                    data-value="{{ $cartItem->quantity }}"
                                                                    data-name="quantity" 
                                                                    data-type="tel" 
                                                                    data-pk="{{ $cartItem->order_item_id }}"
                                                                    data-url="{{ route('admin.order.item.edit') }}"
                                                                    min=0>
                                                                    {{ $cartItem->quantity }}
                                                                </a>
                                                            </td>
                                                            <td class="product_total item_id_376">{{ \App\Helpers\Common::priceFormat($cartItem->price*$cartItem->quantity) }} đ</td>
                                                            <td>
                                                                <span onclick="deleteItem({{ $cartItem->order_item_id }});" class="btn btn-danger btn-xs" data-title="Delete">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <td style="padding: 25px 0px;color: red;" colspan="6" class="text-center">Đơn hàng không có sản phẩm</td>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="loading" style="display: none;">
            <div id="overlay" class="overlay"><i class="fa fa-spinner fa-pulse fa-5x fa-fw "></i></div>
        </div>
@endsection

@section('js')
<script src="{{asset('template/js/bootstrap-editable.min.js')}}"></script>
<script>
    function multipleDelete() {
        let idList = [];
        console.log(document.querySelectorAll('.table-checkbox'));
        let input = document.querySelectorAll('.table-checkbox:checked').forEach(function (item) {
            idList.push(item.getAttribute('data-id'));
        })

        if (idList.length > 0) {
            console.log(idList)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    idList.forEach(function (id) {
                        deleteAjax(id);
                    })
                }
            })
        }
    }
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('.select2').select2();
    });

    function update_total(e) {
        node = e.closest('tr');
        var qty = node.find('.add_qty').eq(0).val();
        var price = node.find('.add_price').eq(0).val();
        node.find('.add_total').eq(0).val(qty * price);
    }


    //Add item
    function selectProduct(element) {
        node = element.closest('tr');
        var id = parseInt(node.find('option:selected').eq(0).val());
        if (id == 0) {
            node.find('.add_sku').val('');
            node.find('.add_qty').eq(0).val('');
            node.find('.add_price').eq(0).val('');
            node.find('.add_attr').html('');
        } else {
            $.ajax({
                url: '{{ route('admin.order.item.product.info') }}',
                type: "get",
                dateType: "application/json; charset=utf-8",
                data: {
                    id: id,
                    order_id: {{ $order->id }},
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (result) {
                    console.log(result);
                    var data = result.data;
                    node.find('.add_sku').val(data.product_code);
                    node.find('.add_qty').eq(0).val(1);
                    if(data.sale_price) {
                        node.find('.add_price').eq(0).val(data.sale_price * 1);
                        node.find('.add_total').eq(0).val(data.sale_price * 1);
                    } else {
                        node.find('.add_price').eq(0).val(data.price * 1);
                        node.find('.add_total').eq(0).val(data.price * 1);
                    }
                    node.find('.add_attr').eq(0).html(data.renderAttDetails);
                    $('#loading').hide();
                }
            });
        }

    }

    $('#add-item-button').click(function() {
        $.ajax({
            url: '{{ route('admin.order.item.new') }}',
            type: 'GET',
            dataType: 'json',
            data: {
            },
            success: function (result) {
                var html = result.data;
                $('#add-item').before(html);
                $('.select2').select2();
                $('#add-item-button-save').show();
            }
        });
    });

    $('#add-item-button-save').click(function (event) {
        $('#add-item-button').prop('disabled', true);
        $('#add-item-button-save').button('loading');
        $.ajax({
            url: '{{ route('admin.order.item.store') }}',
            type: 'post',
            dataType: 'json',
            data: $('form#form-add-item').serialize(),
            beforeSend: function () {
                $('#loading').show();
            },
            success: function (result) {
                $('#loading').hide();
                location.reload();
            }
        });
    });
    //End add item
    //
    $(document).ready(function () {
        all_editable();
    });

    function all_editable() {
        $('.updateInfo').editable({
            success: function (response) {
                Swal.fire(
                    'Thành công!',
                    'Bạn đã khôi phục sản phẩm thành công.',
                    'success',
                );
            }
        });

        $(".updatePrice").on("shown", function (e, editable) {
            var value = $(this).text().replace(/,/g, "");
            editable.input.$input.val(parseInt(value));
        });

        $('.updateStatus').editable({
            validate: function (value) {
                if (value == '') {
                    return 'Data not empty!';
                }
            },
            success: function (response) {
                if (response.status == false) {
                    Toast.fire({
                        type: 'error',
                        title: response.msg
                    });
                } else {
                    Toast.fire({
                        type: 'success',
                        title: response.msg
                    });
                }
            }
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $('.updateInfoRequired').editable({
            validate: function (value) {
                if (value == '') {
                    return 'Giá trị bắt buộc!';
                }
            },
            success: function (response, newValue) {
                Toast.fire({
                    type: 'success',
                    title: response.msg
                });
            }
        });


        $('.edit-item-detail').editable({
            ajaxOptions: {
                type: 'post',
                dataType: 'json'
            },
            validate: function (value) {
                if (value == '') {
                    return 'Dữ liệu không trống!';
                }
                if (!$.isNumeric(value)) {
                    return 'Vui lòng nhập số!';
                }
            },
            success: function (response, newValue) {
                Swal.fire(
                    'Thành công!',
                    response.msg,
                    'success'
                )
                location.reload();
            }

        });

        $('.updatePrice').editable({
            ajaxOptions: {
                type: 'post',
                dataType: 'json'
            },
            validate: function (value) {
                if (value == '') {
                    return 'Dữ liệu không trống!';
                }
                if (!$.isNumeric(value)) {
                    return 'Vui lòng nhập số!';
                }
            },
            success: function (response, newValue) {
                Swal.fire(
                    'Thành công!',
                    response.msg,
                    'success'
                )
                location.reload();
            }
        });
    }

    function deleteItem(id) {
        Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true,
        }).fire({
            title: 'Bạn chắc chắn xóa sản phẩm này khỏi đơn hàng?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý!',
            confirmButtonColor: "#DD6B55",
            cancelButtonText: 'Hủy bỏ!',
            reverseButtons: true,
            preConfirm: function () {
                return new Promise(function (resolve) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'POST',
                        url: '{{ route('admin.order.item.destroy') }}',
                        data: {
                            'id': id
                        },
                        success: function (response) {
                            if (response.status == true) {
                                Swal.fire(
                                    'Thành công!',
                                    response.msg,
                                    'success'
                                )
                                location.reload();
                            } else {
                                Swal.fire(
                                    'Thất bại!',
                                    response.msg,
                                    'error'
                                )
                            }
                        }
                    });
                });
            }

        }).then((result) => {
            if (result.value) {
                alertMsg('success', 'Item has been deleted.', 'Deleted!');
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
            }
        })
    }

    $(document).ready(function () {
        if ($.support.pjax) {
            $.pjax.defaults.timeout = 2000; // time in milliseconds
        }
    });

    function order_print() {
        $('.not-print').hide();
        window.print();
        $('.not-print').show();
    }
</script>
@endsection