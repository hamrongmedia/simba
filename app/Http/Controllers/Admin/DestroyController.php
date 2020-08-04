<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class DestroyController extends Controller
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
            case 'product':
                $model = Product::class;
			default:
				# code...
				break;
		}
		return $this->destroyModel($id,$model);
	}

    /*
    *--------------------------------------------------------------------------
    * Function Excuse Destroy Model
    * @param Request $request
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
   public function destroyModel($id,$model)
   {
		try {
			$data = $model::where('id', $id)->select('id')->first();
			if(!$data) return $this->respondWithError('Không tồn tại bản ghi');
			$data->delete_flag = true;
			$data->save();
            $msg = 'Xóa sản phẩm thành công';
			return response()->json(array('status' => true, 'msg'=>$msg));
		} catch (\Exception $e) {
			return $this->renderJsonResponse( $e->getMessage() );
		}
   }
}
