<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\ShippingStatus;
use Log;
class RestoreController extends Controller
{
    /**
     * @var request
     */
    protected $request;

    public function __construct(
        Request $request
    )
    {
        $this->request = $request;
    }

        /*
    *--------------------------------------------------------------------------
    * Restore Record Model
    * @param Request $request
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
	public function restore(Request $request)
	{
		$id = $this->request->get('id');
		$model = $this->request->get('model');
		switch ($model) {
			case 'page':
				$model = Page::class;
				break;
			case 'post':
				$model = Post::class;
                break;
            case 'product':
                $model = Product::class;
                break;            
            case 'product_category':
                $model = ProductCategory::class;
                break;
            case 'order_status':
                $model = OrderStatus::class;
                break;
            case 'payment_method':
                $model = PaymentMethod::class;
                break;
            case 'shipping_status':
                $model = ShippingStatus::class;
                break;
			default:
				# code...
				break;
        }
		return $this->restoreModel($id,$model);
	}

    /*
    *--------------------------------------------------------------------------
    * Function Excuse Restore Model
    * @param Request $request
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
   public function restoreModel($id,$model)
   {
		try {
            $data = $model::where('id', $id)->select('id','is_deleted')->first();
            $data->is_deleted = false;
            $data->save();
            $msg = 'Thành công';
			return response()->json(array('status' => true, 'msg'=>$msg));
		} catch (\Exception $e) {
			return $this->renderJsonResponse( $e->getMessage() );
		}
   }

}
