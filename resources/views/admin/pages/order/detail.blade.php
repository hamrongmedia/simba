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
                        <h3 class="box-title">Order detail #{{ $order->order_code }}</h3>
                        <div class="box-tools not-print">
                            <div class="btn-group pull-right" style="margin-right: 0px">
                                <a href="https://demo.s-cart.org/sc_admin/order"
                                    class="btn btn-sm btn-flat btn-default"><i
                                        class="fa fa-list"></i>&nbsp;List</a>
                            </div>
                            <div class="btn-group pull-right" style="margin-right: 10px">
                                <a href="https://demo.s-cart.org/sc_admin/order/export_detail?order_id=300&amp;type=invoice"
                                    class="btn btn-sm btn-flat btn-twitter" title="Export"><i
                                        class="fa fa-file-excel-o"></i><span class="hidden-xs">
                                        Excel</span></a>
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
                                    <td><a href="#" class="updateInfoRequired" data-name="last_name"
                                            data-type="text" data-pk="300"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Last name">{{ $order->fullname }}</a></td>
                                </tr>

                                <tr>
                                    <td class="td-title">Số điện thoại:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="phone"
                                            data-type="text" data-pk="300"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Phone">{{ $order->phone }}</a></td>
                                </tr>

                                <tr>
                                    <td class="td-title">Email:</td>
                                    <td>{{ $order->email }}</td>
                                </tr>



                                <tr>
                                    <td class="td-title">Tỉnh thành:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="address1"
                                            data-type="text" data-pk="300"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Address 1">{{ $order->province->name }}</a></td>
                                </tr>

                                <tr>
                                    <td class="td-title">Quận huyện:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="address2"
                                            data-type="text" data-pk="300"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Address 2">{{ $order->district->name }}</a></td>
                                </tr>

                                <tr>
                                    <td class="td-title">Phường xã:</td>
                                    <td>{{ $order->ward->name }}</td>
                                </tr>

                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="td-title">Trạng thái đơn hàng:</td>
                                    <td>{{ $order->orderStatus->name ?? ''}}</td>
                                </tr>
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <td class="td-title">Tổng phụ:</td>
                                    <td>{{ \App\Helpers\Common::priceFormat($order->subtotal) }} đ</td>
                                </tr>
                                <tr>
                                    <td class="td-title">Phí vận chuyển:</td>
                                    <td>{{ \App\Helpers\Common::priceFormat($order->delivery_fee_total) }}đ</td>
                                </tr>
                                <tr>
                                    <td class="td-title">Tổng tiền:</td>
                                    <td>{{ \App\Helpers\Common::priceFormat($order->payment_total) }}đ</td>
                                </tr>
                            </table>
                        </div>

                    </div>


                    <form id="form-add-item" action="" method="">
                        <input type="hidden" name="_token" value="foBMOeniEJ52saPQBN2IkKdhQHw74SYV3lyxqF20">
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
                                                @if($datas)
                                                    @foreach ($datas as $cartItem)
                                                        <tr>
                                                            <td>{{ $cartItem->name }}</td>
                                                            <td>{{ $cartItem->product_code }}</td>
                                                            <td class="product_price">
                                                                <a href="#"
                                                                    class="edit-item-detail" data-value="{{ $cartItem->price }}"
                                                                    data-name="price" data-type="number" min=0
                                                                    data-pk="376"
                                                                    data-url="https://demo.s-cart.org/sc_admin/order/edit_item"
                                                                    data-title="Price">
                                                                    {{ \App\Helpers\Common::priceFormat($cartItem->price) }}
                                                                </a>
                                                            </td>
                                                            <td class="product_qty">x 
                                                                <a href="#" class="edit-item-detail" data-value="{{ $cartItem->quantity }}">{{ $cartItem->quantity }}</a></td>
                                                            <td class="product_total item_id_376">$4,000</td>
                                                            <td>
                                                                <span onclick="deleteItem({{ $cartItem->product_id }});"
                                                                    class="btn btn-danger btn-xs" data-title="Delete"><i
                                                                        class="fa fa-trash"
                                                                        aria-hidden="true"></i></span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif

                                                <tr id="add-item" class="not-print">
                                                    <td colspan="6">
                                                        <button type="button"
                                                            class="btn btn-sm btn-flat btn-success"
                                                            id="add-item-button" title="Add product"><i
                                                                class="fa fa-plus"></i> Add product</button>
                                                        &nbsp;&nbsp;&nbsp;<button
                                                            style="display: none; margin-right: 50px"
                                                            type="button"
                                                            class="btn btn-sm btn-flat btn-warning"
                                                            id="add-item-button-save" title="Save"><i
                                                                class="fa fa-save"></i> Save</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="box collapsed-box">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="td-title-normal">Sub Total:</td>
                                        <td style="text-align:right" class="data-subtotal">4,000</td>
                                    </tr>




                                    <tr>
                                        <td class="td-title-normal">Tax:</td>
                                        <td style="text-align:right" class="data-tax">400</td>
                                    </tr>





                                    <tr>
                                        <td>Shipping Standard:</td>
                                        <td style="text-align:right"><a href="#"
                                                class="updatePrice data-shipping" data-name="shipping"
                                                data-type="text" data-pk="1738"
                                                data-url="{{route('admin.order.update')}}"
                                                data-title="Shipping price">20000</a></td>
                                    </tr>




                                    <tr>
                                        <td>Discount(-):</td>
                                        <td style="text-align:right"><a href="#"
                                                class="updatePrice data-discount" data-name="discount"
                                                data-type="text" data-pk="1739"
                                                data-url="{{route('admin.order.update')}}"
                                                data-title="Discount">0</a></td>
                                    </tr>
                                    <tr style="background:#f5f3f3;font-weight: bold;">
                                        <td>Total:</td>
                                        <td style="text-align:right" class="data-total">24,400</td>
                                    </tr>
                                    <tr>
                                        <td>Received(-):</td>
                                        <td style="text-align:right"><a href="#"
                                                class="updatePrice data-received" data-name="received"
                                                data-type="text" data-pk="1741"
                                                data-url="{{route('admin.order.update')}}"
                                                data-title="Received">0</a></td>
                                    </tr>
                                    <tr style="font-weight:bold;" class="data-balance">
                                        <td>Balance:</td>
                                        <td style="text-align:right">24,400</td>
                                    </tr>
                                </table>
                            </div>

                        </div>



                        <div class="col-sm-6">
                            <div class="box collapsed-box">
                                <table class="table box table-bordered">
                                    <tr>
                                        <td class="td-title">Order note:</td>
                                        <td>
                                            <a href="#" class="updateInfo" data-name="comment" data-type="text"
                                                data-pk="300"
                                                data-url="{{route('admin.order.update')}}"
                                                data-title="">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="box collapsed-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Order history</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="box-body table-responsive no-padding box-primary">
                                    <table class="table table-bordered" id="history">
                                        <tr>
                                            <th>Staff</th>
                                            <th>Content</th>
                                            <th>Time</th>
                                        </tr>
                                        <tr>
                                            <td>Test</td>
                                            <td>
                                                <div class="history">New order</div>
                                            </td>
                                            <td>2020-07-27 18:48:12</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
<script src="{{asset('js/bootstrap-editable.min.js')}}"></script>
<script>
    
    function deleteItem(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })
            .then((result) => {
                if (result.value) {
                    deleteAjax(id);
                }
            })
    }

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
        //Initialize Select2 Elements
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
            node.find('.add_tax').html('');
        } else {
            $.ajax({
                url: 'https://demo.s-cart.org/sc_admin/order/product_info',
                type: "get",
                dateType: "application/json; charset=utf-8",
                data: {
                    id: id,
                    order_id: 300,
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (returnedData) {
                    node.find('.add_sku').val(returnedData.sku);
                    node.find('.add_qty').eq(0).val(1);
                    node.find('.add_price').eq(0).val(returnedData.price_final * 1);
                    node.find('.add_total').eq(0).val(returnedData.price_final * 1);
                    node.find('.add_attr').eq(0).html(returnedData.renderAttDetails);
                    node.find('.add_tax').eq(0).html(returnedData.tax);
                    $('#loading').hide();
                }
            });
        }

    }

    // $('#add-item-button-save').click(function (event) {
    //     $('#add-item-button').prop('disabled', true);
    //     $('#add-item-button-save').button('loading');
    //     $.ajax({
    //         url: 'https://demo.s-cart.org/sc_admin/order/add_item',
    //         type: 'post',
    //         dataType: 'json',
    //         data: $('form#form-add-item').serialize(),
    //         beforeSend: function () {
    //             $('#loading').show();
    //         },
    //         success: function (result) {
    //             $('#loading').hide();
    //             if (parseInt(result.error) == 0) {
    //                 location.reload();
    //             } else {
    //                 alertJs('error', result.msg);
    //             }
    //         }
    //     });
    // });

    //End add item
    //

    $(document).ready(function () {
        all_editable();
    });

    function all_editable() {
        $.fn.editable.defaults.params = function (params) {
            params._token = {{csrf_token()}};
            return params;
        };

        $('.updateInfo').editable({
            success: function (response) {
                if (response.error == 0) {
                    alertJs('success', response.msg);
                } else {
                    alertJs('error', response.msg);
                }
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
                if (response.error == 0) {
                    alertJs('success', response.msg);
                } else {
                    alertJs('error', response.msg);
                }
            }
        });

        $('.updateInfoRequired').editable({
            validate: function (value) {
                if (value == '') {
                    return 'Data not empty!';
                }
            },
            success: function (response, newValue) {
                console.log(response.msg);
                if (response.error == 0) {
                    alertJs('success', response.msg);
                } else {
                    alertJs('error', response.msg);
                }
            }
        });


        $('.edit-item-detail').editable({
            ajaxOptions: {
                type: 'post',
                dataType: 'json'
            },
            validate: function (value) {
                if (value == '') {
                    return 'Data not empty!';
                }
                if (!$.isNumeric(value)) {
                    return 'Please input numeric!';
                }
            },
            success: function (response, newValue) {
                if (response.error == 0) {
                    $('.data-shipping').html(response.detail.shipping);
                    $('.data-received').html(response.detail.received);
                    $('.data-subtotal').html(response.detail.subtotal);
                    $('.data-tax').html(response.detail.tax);
                    $('.data-total').html(response.detail.total);
                    $('.data-shipping').html(response.detail.shipping);
                    $('.data-discount').html(response.detail.discount);
                    $('.item_id_' + response.detail.item_id).html(response.detail.item_total_price);
                    var objblance = $('.data-balance').eq(0);
                    objblance.before(response.detail.balance);
                    objblance.remove();
                    alertJs('success', response.msg);
                } else {
                    alertJs('error', response.msg);
                }
            }

        });

        $('.updatePrice').editable({
            ajaxOptions: {
                type: 'post',
                dataType: 'json'
            },
            validate: function (value) {
                if (value == '') {
                    return 'Data not empty!';
                }
                if (!$.isNumeric(value)) {
                    return 'Please input numeric!';
                }
            },

            success: function (response, newValue) {
                if (response.error == 0) {
                    $('.data-shipping').html(response.detail.shipping);
                    $('.data-received').html(response.detail.received);
                    $('.data-subtotal').html(response.detail.subtotal);
                    $('.data-tax').html(response.detail.tax);
                    $('.data-total').html(response.detail.total);
                    $('.data-shipping').html(response.detail.shipping);
                    $('.data-discount').html(response.detail.discount);
                    var objblance = $('.data-balance').eq(0);
                    objblance.before(response.detail.balance);
                    objblance.remove();
                    alertJs('success', response.msg);
                } else {
                    alertJs('error', response.msg);
                }
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
            title: 'Are you sure to delete this item?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            confirmButtonColor: "#DD6B55",
            cancelButtonText: 'No, cancel!',
            reverseButtons: true,

            preConfirm: function () {
                return new Promise(function (resolve) {
                    $.ajax({
                        method: 'POST',
                        url: 'https://demo.s-cart.org/sc_admin/order/delete_item',
                        data: {
                            'pId': id,
                            _token: 'foBMOeniEJ52saPQBN2IkKdhQHw74SYV3lyxqF20',
                        },
                        success: function (response) {
                            if (response.error == 0) {
                                location.reload();
                                alertJs('success', response.msg);
                            } else {
                                alertJs('error', response.msg);
                            }

                        }
                    });
                });
            }

        }).then((result) => {
            if (result.value) {
                alertMsg('success', 'Item has been deleted.', 'Deleted!');
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                // swalWithBootstrapButtons.fire(
                //   'Cancelled',
                //   'Your imaginary file is safe :)',
                //   'error'
                // )
            }
        })
    }



    $(document).ready(function () {
        // does current browser support PJAX
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