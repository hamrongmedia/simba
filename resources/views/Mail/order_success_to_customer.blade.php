<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>xác nhận thanh toán</h2>
    <p>Chào {{ $order->fullname }} . Bạn đã đặt hàng trên hệ thống với những thông tin như sau :</p>
    <ul>
    	<li>Họ tên:{{ $order->fullname }}</li>
    	<li>Số điện thoại:{{ $order->phone }} </li>
    	<li>Email:{{ $order->email }} </li>
    	<li>Địa chỉ:{{ $order->address }}</li>
    	<li>Xã/Phường: {{ $order->ward->name }} - Quận/Huyện: {{ $order->district->name }} - Tỉnh thành:{{ $order->province->name }}</li>
    	<li>Trạng thái đơn hàng: {{ $order->orderStatus->name ?? ''}}</li>
    	<li>Trạng thái vận chuyển: {{ $order->shippingStatus->name ?? ''}}</li>
    	<li>Phương thức thanh toán: {{ $order->paymentMethod->name ?? ''}}</li>
    	<li>Ghi chú: {{ $order->message ?? ''}}</li>
    </ul>
    <p>Mã đơn hàng : <strong>{{ $order->order_code }}</strong></p>
		<table border="1">
		  <tr>
		    <th>STT</th>
		    <th>Tên sản phẩm</th>
		    <th>Mã sản phẩm</th>
		    <th>Giá</th>
		    <th>Số lượng</th>
		  </tr>
		  	@foreach ($datas as $cartItem)
				<tr>
					<td>{{ $loop->index+1 }}</td>
					<td>
						{{ $cartItem->name }}
						@if($cartItem->type == \App\Models\Product::PRODUCT_ATTRIBUTE)
                            <b>Color:</b> {{ $cartItem->pav1_value }} @if($cartItem->pav2_id) &emsp;<b>Size:</b> {{ $cartItem->pav2_value }} @endif
                        @endif
					</td>
					<td>{{ $cartItem->product_code }}</td>
					<td>{{ $cartItem->price }}</td>
					<td>{{ $cartItem->quantity }}</td>
				</tr>
		  @endforeach
		</table>
		<p><strong>Tổng phụ : {{  $order->total }} </strong></p>
		<p><strong>Phí giao hàng : {{  $order->delivery_fee_total }} </strong></p>
		<p><strong>Tổng thanh toán : {{  $order->payment_total }} </strong></p>
  </body>
</html>