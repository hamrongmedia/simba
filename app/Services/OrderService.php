<?php
namespace App\Services;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class OrderService
{
    protected function guard()
    {
        return Auth::guard();
    }
    /*
    *--------------------------------------------------------------------------
    * Create Checkout Order
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
   public function storeOrder($request)
   {    
        $order_code = date('ydHis');
        $user = $this->guard()->user();
        $order = New Order();
        if($user) {
        	$order->user_id = $user->id;
        }
        $order->fullname = $request->fullname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->company_name = $request->company_name;
        $order->address = $request->address;
        $order->message = $request->message;
        $order->order_code = $order_code;
        $order->subtotal = $request->total_cart_money;
        $order->delivery_fee_total = $request->shipcode_value;
        $order->payment_total = $request->total_cart_money + $request->shipcode_value;
        $order->province_id = $request->province_id;
        $order->district_id = $request->district_id;
        $order->ward_id = $request->war_id;
        $order->payment_method_id = 1;
        $order->order_status_id = OrderStatus::STATUS_PENDING;
        $order->save();
        return $order;
    }
   
    /*
    *--------------------------------------------------------------------------
    * Create Checkout Order Item
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
    public function storeOrderItem($request, $cartItem, $order)
    {
        $orderItem = New OrderItem;
        $orderItem->order_id = $order->id;
        $orderItem->product_id = $cartItem->product_id;
        if($cartItem->type == Product::PRODUCT_ATTRIBUTE) {
            $orderItem->product_type = Product::PRODUCT_ATTRIBUTE;
            $orderItem->attribute_value1 = $cartItem->pav1_id;
            $orderItem->attribute_value2 = $cartItem->pav2_id;
        }
        $orderItem->price = $cartItem->price;
        $orderItem->quantity = $cartItem->quantity;
        $orderItem->product_code = $cartItem->product_code;
        $orderItem->product_name = $cartItem->name;
        $orderItem->save();
        return $orderItem;
    }
}
