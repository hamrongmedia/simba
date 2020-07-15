<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\ProductCategory;
use App\Models\ProductToCategory;
use App\Models\ProductAttributeMap;
use App\Models\ProductType;
use App\Models\ProductImage;
use App\Models\ProductInfo;
use App\Models\ProductColor;
use DB;

class ProductInfoController extends Controller
{
	public function index(Request $request)
	{
		
	}

    /*
    *--------------------------------------------------------------------------
    * Product Info Store
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
	public function store(Request $request, $id)
	{
		# Check exit;
		$attribute_sets = $request->attribute_sets;
		$check_condition = ProductInfo::where('product_id',$id)->where('attribute_value1',$attribute_sets[0]);
		if ( count($attribute_sets) == 2 ) {
			$check_condition->where('attribute_value2',$attribute_sets[1]);
		}
		$check_condition = $check_condition->first();
		if($check_condition) {
			return $this->respondWithError('Biến thể đã tồn tại');
		}
		DB::beginTransaction();
		try {
			$data = New ProductInfo();
			$data->product_id = $id;
			$data->attribute_value1 = $attribute_sets[0];
			if ( count($attribute_sets) == 2 ) {
				$data->attribute_value2 = $attribute_sets[1];
			}
			$data->save();
			if($request->thumbnail) {
				$product_color = New ProductColor();
				$product_color->product_id = $id;
				$product_color->color_id = $attribute_sets[0];
				$product_color->image_path = $request->thumbnail;
				$product_color->save();
			}
			DB::commit();
			$data = Product::find($id);
	        $product_attribute_map = ProductAttribute::with('attributeValues')
	                                ->join('product_attribute_map','product_attributes.id','=','product_attribute_map.product_attribute_id')
	                                ->where('product_id',$id)
	                                ->select('product_attributes.name','product_attributes.id')
	                                ->get();                  

	        $product_info = ProductInfo::leftJoin('product_attribute_values as pav1','product_info.attribute_value1','=','pav1.id')
	                                    ->leftJoin('product_attribute_values as pav2','product_info.attribute_value2','=','pav2.id')
	                                    ->leftJoin('product_color as pc','product_info.attribute_value1','=','pc.id')
	                                    ->where('product_info.product_id',$id)
	                                    ->select(
	                                        'product_info.id',
	                                        'pav1.id as pav1_id',
	                                        'pav1.value as pav1_value',
	                                        'pav2.id as pav2_id',
	                                        'pav2.value as pav2_value',
	                                        'image_path'
	                                    )
	                                    ->get();
            $view = view("admin.pages.product.varition",
		            	compact(
		            	'data','product_attribute_map','product_info'
		            ))->render();
            return $this->respondJsonData('Thêm biến thể thành công',$view);
		} catch (\Exception $e) {
			DB::rollBack();
			return $this->respondWithError($e->getMessage());
		}
	}

	public function delete(Request $request,$id)
	{
		$product_info = ProductInfo::where('id',$id)->first();
		if($product_info) {
			return response()->json([
				'success' => true,
				'status' => 'Thành công',
			]);
		}
		return response()->json([
			'success' => false,
			'status' => 'Thất bại',
		]);		
	}
}
