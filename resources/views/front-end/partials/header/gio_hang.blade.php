<div id="site-cart" class="">
    <div class="site-nav-container-last">
        <button id="site-close-handle" class="site-close-handle">
            <img src="{{asset('images/clo.png')}}" alt="Đóng">
        </button>
        <p class="title">Giỏ hàng</p>
        <span class="textCartSide">Bạn đang có <span id="qtotalitems"><b>1</b></span> sản phẩm trong giỏ hàng.</span>
        <div class="cart-view clearfix">
            <table id="cart-view">
                <tbody id="ajax-cart-form">
                    <!-- khi có sản phẩm -->
                    <tr class="item_2" data-id="1041431100">
                        <td class="img">
                            <a href="ao-freedom-1805-p846.html">
                                <!-- ảnh được cắt 470x570 -->
                                <img src="{{asset('images-demo/1590838844.jpg')}}" alt="Áo Freedom 1805">
                            </a>
                        </td>
                        <td>
                            <input name="quantity" value="" class="quantity ajax-quantity" type="hidden">
                            <a class="pro-title-view" href="#">Áo Freedom 1805</a>
                            <span class="pro-price-view">259.000₫</span>
                            <span class="pro-price-view">Số lượng: 1</span>
                            <div class="variant">
                                <span>Size : 34</span>
                                <span>Màu sắc : Da</span>
                            </div>
                            <div class="remove_link remove-cart delete_item"><a href="javascript:void(0);" class="quantity">Xóa</a></div>
                        </td>
                    </tr>
                    <!-- không có sản phẩm khi nào làm chức năng thì xóa đoạn code style đi chuyển thành đặt điều kiện -->
                    <tr class="notification" style="display: none;">
                        <td colspan="2" class="text-center">
                            Chưa có sản phẩm nào trong giỏ hàng
                        </td>
                    </tr>
                </tbody>
            </table>
            <span class="line"></span>
            <table class="table-total">
                <tbody>
                    <tr>
                        <td class="text-left"><b>TỔNG TIỀN TẠM TÍNH:</b></td>
                        <td class="text-right" id="total-view-cart">259.000₫</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="{{route('checkout.index')}}" class="checkLimitCart linktocheckout button dark">Đặt hàng</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="javascript:void(0);" class="linktocart button dark">Chọn thêm sản phẩm <i class="fa fa-arrow-right"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>