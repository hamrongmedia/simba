<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductInfo;
use App\Models\OrderItem;
use App\Repositories\Product\ProductRepository;
use App\Repositories\OrderItem\OrderItemRepository;
use App\Services\OrderService;
use Illuminate\Support\Collection;
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
   		$order_item_id = $request->id;
   		$order = $this->orderService->deleteOrderItem($order_item_id);
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

   public function editItem(Request $request)
   {
        $id = $request->pk;
        $orderItem = OrderItem::where('id',$id)->first();
        if(!$orderItem) return $this->respondWithError('Không tồn tại bản ghi');
        $name = $request->name;
        $value = $request->value;
        $orderItem->$name = $value;
        $orderItem->save();
        // Re Calculator Order
        $order_id = $orderItem->order_id;
        $order = $this->orderService->reCaculatorOrder($order_id);
        $data = [];
        $data['orderItem'] = $orderItem;
        $data['order'] = $order;
        return $this->respondJsonData('Cập nhật thành công',$data);
   }

    /*
    *--------------------------------------------------------------------------
    * Product Info
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
   public function productInfo(Request $request)
   {
        $id = $request->id;
        $product = Product::find($id);
        # Case Product Attribute
        if ($product->type == Product::PRODUCT_ATTRIBUTE) {
            $attributes = ProductInfo::leftJoin('product_attribute_values as pav1', 'product_info.attribute_value1', '=', 'pav1.id')
                ->leftJoin('product_attribute_values as pav2', 'product_info.attribute_value2', '=', 'pav2.id')
                ->leftJoin('products', 'products.id', '=', 'product_info.product_id')
                ->distinct('product_info.attribute_value1')
                ->where('product_info.product_id', $product->id)
                ->select(
                    'pav1.id as pav1_id',
                    'pav1.value as pav1_value',
                    'pav2.id as pav2_id',
                    'pav2.value as pav2_value',
                )
                ->distinct()
                ->get()
                ->toArray();
            $product_attributes = [];
            $collection = new Collection($attributes);
            $genera = $collection->groupBy('pav1_id');
            $all_sizes = [];
            $renderAttColors = '<br><br><b><label>Color</label></b>:';
            $renderAttSizes = '';
            $renderAttDetails = '';
            foreach ($genera as $key => $value) {
                $group_pav2 = [];
                $sizeids = '';
                foreach ($value as $k => $v) {
                    if ($v['pav2_id']) {
                        $renderAttSizes.= '<label class="radio-inline"><input checked type="radio" name="add_att[10][2]" value="'.$v['pav2_value'].'">'.$v['pav2_value'].'</label>';
                    }
                }
                $renderAttColors.='<label class="radio-inline"><input checked type="radio" name="add_att[10][1]" value="'.$key.'">'.$value[0]['pav1_value'].'</label>';
            }
            if($renderAttSizes) {
                $renderAttDetails = $renderAttColors.'<br><label>Size</label></b>:'.$renderAttSizes;
            }
            $product->renderAttDetails = $renderAttDetails;
            $product->product_attributes = $product_attributes;
        }
        if(!$product) return $this->respondWithError('Không tồn tại bản ghi');
        return $this->respondJsonData('Thêm sản phẩm thành công',$product);
   }
}
