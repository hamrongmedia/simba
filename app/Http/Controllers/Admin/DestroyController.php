<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use App\Models\Page;
use App\Models\PaymentMethod;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ShippingStatus;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    /**
     * @var request
     */
    protected $request;

    public function __construct(
        Request $request
    ) {
        $this->request = $request;
    }

    /*
     *--------------------------------------------------------------------------
     * Destroy Record Model
     * @param Request $request
     * @return Return \Illuminate\Support\Facades\View
     *--------------------------------------------------------------------------
     */
    public function destroy(Request $request)
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

        if ($request->has('is_hard_destroy')) {
            if ($request->is_hard_destroy == 1) {
                return $this->hardDestroyModel($id, $model);
            }
        }

        return $this->destroyModel($id, $model);
    }

    /*
     *--------------------------------------------------------------------------
     * Function Excuse Destroy Model
     * @param Request $request
     * @return Return \Illuminate\Support\Facades\View
     *--------------------------------------------------------------------------
     */
    public function destroyModel($id, $model)
    {
        try {
            $data = $model::where('id', $id)->select('id')->first();
            if (!$data) {
                return $this->respondWithError('Không tồn tại bản ghi');
            }

            $data->is_deleted = true;
            $data->save();
            $msg = 'Xóa thành công';
            return response()->json(array('status' => true, 'msg' => $msg));
        } catch (\Exception $e) {
            return $this->renderJsonResponse($e->getMessage());
        }
    }

    /*
     *--------------------------------------------------------------------------
     * Function Excuse Destroy Model
     * @param Request $request
     * @return Return \Illuminate\Support\Facades\View
     *--------------------------------------------------------------------------
     */
    public function hardDestroyModel($id, $model)
    {
        try {
            $data = $model::where('id', $id)->select('id')->first();
            if (!$data) {
                return $this->respondWithError('Không tồn tại bản ghi');
            }
            $data->delete();
            $msg = 'Xóa thành công';
            return response()->json(array('status' => true, 'msg' => $msg));
        } catch (\Exception $e) {
            return $this->renderJsonResponse($e->getMessage());
        }
    }
}