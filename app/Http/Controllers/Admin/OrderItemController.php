<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Repositories\Product\ProductRepository;
use App\Repositories\OrderItem\OrderItemRepository;
use App\Services\OrderService;

class OrderItemController extends Controller
{
    /**
     * @var request
     */
    protected $request;

    /**
     * @var cartRepository
     */
    protected $orderItemRepository;

    /**
     * @var productRepository
     */
    protected $productRepository;

    /**
     * @var orderService;
     */
    protected $orderService;

    public function __construct(
        Request $request,
        OrderService $orderService,
        OrderItemRepository $orderItemRepository,
        ProductRepository $productRepository
    ) {
        $this->request = $request;
        $this->orderService = $orderService;
        $this->orderItemRepository = $orderItemRepository;
        $this->productRepository = $productRepository;
    }

    /*
    *--------------------------------------------------------------------------
    * Delete Order Item
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
   public function destroy(Request $request)
   {
   		$id = $request->id;
   		$orderItem = OrderItem::where('id',$id)->first();
   		if(!$orderItem) return $this->respondWithError('Không tồn tại bản ghi');
   		$order = $this->orderService->deleteOrderItem($orderItem);
   		return $this->respondJsonData('Xóa sản phẩm khỏi đơn hàng thành công',$order);
   }

    /*
    *--------------------------------------------------------------------------
    * New Product Order Item
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
   public function newItem(Request $request)
   {
        $products = Product::select('id','name')->get();
        $view = view("admin.pages.order.item", compact('products'))->render();
        return $this->respondJsonData('Thêm sản phẩm thành công',$view);
   }
}
