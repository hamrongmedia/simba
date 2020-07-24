<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\CartService;
use App\Services\OrderService;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Order\OrderRepository;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use DB;
class CheckoutController extends Controller
{
    const TAKE = 15;
    const ORDERBY = 'desc';
    
    /**
     * @var request
     */
    protected $request;

    /**
     * @var cartRepository
     */
    protected $cartRepository;
    
    /**
     * @var productRepository
     */
    protected $productRepository;

    /**
     * @var orderRepository
     */
    protected $orderRepository;

    /**
     * @var cartService;
     */
    protected $cartService;

    /**
     * @var orderService;
     */
    protected $orderService;

    public function __construct(
        Request $request,
        CartService $cartService,
        OrderService $orderService,
        CartRepository $cartRepository,
        OrderRepository $orderRepository,
        ProductRepository $productRepository
    )
    {
        $this->request = $request;
        $this->cartService = $cartService;
        $this->orderService = $orderService;
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Show oder form
     * @return Illuminate\Http\Response $response
     *
     */
    public function index()
    {
        $user = $this->guard()->user();
        $cart = $this->cartService->getCarts();
        if(!$cart) return redirect()->back();
        $cartItems = $cartItems = $this->cartRepository->getListItemCart($this->request, $cart->cart_key, $user);
        return view('front-end.checkout.index',compact('cart','cartItems'));
    }

    /*
    *--------------------------------------------------------------------------
    * Create Checkout
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
   public function store(CheckoutRequest $request)
   {
        $user = $this->guard()->user();
        $cart = $this->cartService->getCarts();
        if(!$cart) return redirect()->back();
        $cartItems = $cartItems = $this->cartRepository->getListItemCart($this->request, $cart->cart_key, $user);
        DB::beginTransaction();
        try {
            # Create Order
            $order = $this->orderService->storeOrder($request);
            # Create Order Item
            $data_order_detail = [];
            $payment_total = 0;
            foreach ($cartItems as $cartItem) {
                $quantity = $cartItem->quantity;
                $price = $cartItem->price;
                $order_detail =$this->orderService->storeOrderItem($request, $cartItem, $order);
                $data_order_detail[] = $order_detail;
                $payment_total +=  $quantity*$price;
            }
            # Delete Cart And Cart Item
            $this->cartService->clearCart();
            # Update Total Order
            $order->payment_total = $payment_total;
            $order->save();
            DB::commit();
            # Send email order to user & admin 
            $dataSendEmail = array();
            $dataSendEmail['user'] = $user;
            $dataSendEmail['order'] = $order;
            $dataSendEmail['data_order_detail'] = $data_order_detail;
            // dispatch(new \App\Jobs\JobSendEmailOrderToUser($dataSendEmail));
            // dispatch(new \App\Jobs\JobSendEmailOrderToSystem($dataSendEmail));

            return redirect()->route('checkout.success',['order_code'=>$order->order_code]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
   }

    /*
    *--------------------------------------------------------------------------
    * Create Checkout Order Item
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
    public function success($order_code)
    {
        $order = Order::where('order_code',$order_code)->firstOrFail();
        $datas = $this->orderRepository->getOrderByOrderCode($order_code);
        $user = $this->guard()->user();
        return view('front-end.checkout.success',compact('order','user','datas'));
    }
}
