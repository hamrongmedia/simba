<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>xác nhận thanh toán</h2>
    <p>Chào {{ $order->fullname }} . Người dùng đã đặt hàng trên hệ thống với những thông tin như sau :</p>
    <p>Mã đơn hàng : <strong>{{ $order->order_code }}</strong></p>
		<table border="1">
		  <tr>
		    <th>STT</th>
		    <th>Tên sản phẩm</th>
		    <th>Mã sản phẩm</th>
		    <th>Giá</th>
		    <th>Số lượng</th>
		  </tr>
		  @foreach ($data_order_detail as $key_order=>$order_detail)
			  <tr>
			    <td>{{ $loop->index+1 }}</td>
			    <td>{{ $order_detail['product_name'] }}</td>
			    <td>{{ $order_detail['product_code'] }}</td>
			    <td>{{ $order_detail['price'] }}</td>
			    <td>{{ $order_detail['quantity'] }}</td>
			  </tr>
		  @endforeach
		</table>
		<p><strong>Tổng phụ : {{  $order->subtotal }} </strong></p>
		<p><strong>Phí giao hàng : {{  $order->delivery_fee_total }} </strong></p>
		<p><strong>Tổng thanh toán : {{  $order->payment_total }} </strong></p>
  </body>
</html>