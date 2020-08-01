<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\ProductAttributeMap;
use App\Models\ProductCategory;
use App\Models\ProductToCategory;
use App\Models\ProductType;
use App\Models\ProductImage;
use App\Models\ProductInfo;
use App\Models\ProductColor;
use DB;
use Illuminate\Support\Str;
use Log;
use App\Http\Requests\Admin\ProductInfoRequest;
class ProductInfoController extends Controller
{
	public function show(Request $request)
	{
        $product_info_id = $request->product_info_id;
        $product_info = ProductInfo::find($product_info_id);
		if(!$product_info) return $this->respondWithError('Lỗi! Không có dữ liệu');
		$data = ProductInfo::leftJoin('product_color','product_info.attribute_value1','=','product_color.color_id')
					->where('product_info.id',$product_info_id)
					->select('attribute_value1','attribute_value2','image_path')
					->first();
		$attribute_map = ProductAttributeMap::where('product_id',$product_info->product_id)
									->distinct('product_attribute_id')
									->get()
									->pluck('product_attribute_id');
		$product_attribute_map = ProductAttribute::with('attributeValues')
		            ->select('product_attributes.name', 'product_attributes.id')
		            ->whereIn('product_attributes.id',$attribute_map)
		            ->get();
		$product_image = ProductImage::where('product_id',$product_info->product_id)
									->where('attribute_value1',$product_info->attribute_value1)
									->get();
		return view('admin.pages.product.edit_varition', compact('data','product_attribute_map','product_info_id','product_image'));		
	}

    /*
    *--------------------------------------------------------------------------
    * Create Product Varition 
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
	public function store(ProductInfoRequest $request, $id)
	{
		# Check exit;
		$attribute_sets = $request->attribute_sets;
		$check_condition = ProductInfo::where('product_id',$id)
							->where('attribute_value1',$attribute_sets[0]);
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
				$thumbnail = $request->thumbnail;
				$product_color = ProductColor::updateOrCreate(
				    ['product_id' => $id, 'color_id' => $attribute_sets[0]],
				    ['image_path' => $thumbnail]
				);
			}
			$this->storeProductImage($request, $id, $attribute_sets[0]);
			DB::commit();
			$data = Product::find($id);
	        $product_attribute_map = ProductAttribute::with('attributeValues')
	                                ->join('product_attribute_map','product_attributes.id','=','product_attribute_map.product_attribute_id')
	                                ->where('product_id',$id)
	                                ->select('product_attributes.name','product_attributes.id')
	                                ->get();                  

	        $product_info = ProductInfo::leftJoin('product_attribute_values as pav1','product_info.attribute_value1','=','pav1.id')
	                                    ->leftJoin('product_attribute_values as pav2','product_info.attribute_value2','=','pav2.id')
				                        ->leftJoin('product_color as pc', function($join)
				                        {
				                            $join->on('product_info.attribute_value1', '=', 'pc.color_id');
				                            $join->on('product_info.product_id','=','pc.product_id');

				                        })
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

    /*
    *--------------------------------------------------------------------------
    * Update Product Varition 
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
	public function update(ProductInfoRequest $request, $id)
	{
		$product_info_id = $id;
		DB::beginTransaction();
		try {
			$attribute_sets = $request->attribute_sets;
			$product_info = ProductInfo::where('id',$product_info_id)->firstOrFail();

			if(count($attribute_sets) == 2 ) {
				$check_exits = ProductInfo::where('product_id',$product_info->product_id)
							->where('attribute_value1',$attribute_sets[0])
							->where('attribute_value2',$attribute_sets[1])
							->first();
			} else {
				$check_exits = ProductInfo::where('product_id',$product_info->product_id)
							->where('attribute_value1',$attribute_sets[0])
							->first();
			}
			if(!$check_exits) {
				$product_info->attribute_value1 = $attribute_sets[0];
				$product_info->attribute_value2 = $attribute_sets[1];
				$product_info->save();
				if($request->thumbnail) {
					$thumbnail = $request->thumbnail;
					$product_color = ProductColor::updateOrCreate(
					    ['product_id' => $id, 'color_id' => $attribute_sets[0]],
					    ['image_path' => $thumbnail]
					);
				}				
			} else {
				# Case This
				if($product_info_id == $check_exits->id) {
					if($request->thumbnail) {
					$thumbnail = $request->thumbnail;
					$product_color = ProductColor::updateOrCreate(
					    ['product_id' => $id, 'color_id' => $attribute_sets[0]],
					    ['image_path' => $thumbnail]
					);
					}
				} else {
					return back()->with('msg','Biến thể đã tồn tại');
				}				
			}
			$this->storeProductImage($request, $product_info->product_id, $attribute_sets[0]);
			DB::commit();
            return back();
		} catch (\Exception $e) {
			DB::rollBack();
			return $this->respondWithError($e->getMessage());			
		}
	}

	public function reload(Request $request)
	{
		$id = $request->product_id;
		$data = Product::find($id);
        $product_attribute_map = ProductAttribute::with('attributeValues')
                                ->join('product_attribute_map','product_attributes.id','=','product_attribute_map.product_attribute_id')
                                ->where('product_id',$id)
                                ->select('product_attributes.name','product_attributes.id')
                                ->get();                  

        $product_info = ProductInfo::leftJoin('product_attribute_values as pav1','product_info.attribute_value1','=','pav1.id')
                                    ->leftJoin('product_attribute_values as pav2','product_info.attribute_value2','=','pav2.id')
			                        ->leftJoin('product_color as pc', function($join)
			                        {
			                            $join->on('product_info.attribute_value1', '=', 'pc.color_id');
			                            $join->on('product_info.product_id','=','pc.product_id');

			                        })
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
	}

    /*
    *--------------------------------------------------------------------------
    * Save Product Image
    * @param Int : $product_id
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
   public function storeProductImage($request,$product_id, $attribute_value1)
   {
   		$product_images = $request->product_images;
   		if(is_array($product_images)) {
	   		foreach ($product_images as $image) {
	   			ProductImage::updateOrCreate(
				    ['product_id' => $product_id, 'attribute_value1' => $attribute_value1, 'image_file'=>$image],
				    []
				);
	   		}
   		}
   }

    /*
    *--------------------------------------------------------------------------
    * Delete Product Varition 
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
	public function delete(Request $request)
	{
		$id = $request->id;
		$product_id = $request->product_id;
		$delete_record = ProductInfo::where('id',$id)->first();
		if($delete_record) {
       		$delete_record->delete();
			$data = Product::find($product_id);
	        $product_attribute_map = ProductAttribute::with('attributeValues')
	                                ->join('product_attribute_map','product_attributes.id','=','product_attribute_map.product_attribute_id')
	                                ->where('product_id',$product_id)
	                                ->select('product_attributes.name','product_attributes.id')
	                                ->get();                  

	        $product_info = ProductInfo::leftJoin('product_attribute_values as pav1','product_info.attribute_value1','=','pav1.id')
	                                    ->leftJoin('product_attribute_values as pav2','product_info.attribute_value2','=','pav2.id')
	                                    ->leftJoin('product_color as pc','product_info.attribute_value1','=','pc.id')
	                                    ->where('product_info.product_id',$product_id)
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
            return $this->respondJsonData('Xóa biến thể thành công',$view);
		} else {
			return response()->json([
				'success' => false,
				'status' => 'Thất bại',
			]);		

		}
	}

    /*
    *--------------------------------------------------------------------------
    * Generate all variations
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
	public function postGenerateAllVersions(Request $request, $id)
	{
		$data = Product::find($id);
		if(!$data) return $this->respondWithError('Không tồn tại sản phẩm'); 
		if($data->type != Product::PRODUCT_ATTRIBUTE) return $this->respondWithError('Sản phẩm không phải sản phẩm có thuộc tính');
		$attribute_map = ProductAttributeMap::where('product_id',$id)
									->distinct('product_attribute_id')
									->get()
									->pluck('product_attribute_id');
		# Case Only One Attribute
		if( $attribute_map ) {
			$this->createAllProductInfo($id, $attribute_map,$data);
		}

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
        return $this->respondJsonData('Tạo toàn bộ biến thể thành công',$view);


	}

    /*
    *--------------------------------------------------------------------------
    * Generate all variations
    * @param $product_id
    * @param $attribute_map
    * @param $product
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
    public static function createAllProductInfo($product_id,$attribute_map, $product)
    {
        $attribute_values = [];
        $attribute_values1 = ProductAttributeValue::where('attribute_id',$attribute_map[0])->get();
        if( count($attribute_map) == 2 ) {
            $attribute_values2 = ProductAttributeValue::where('attribute_id',$attribute_map[1])->get();
        }
        foreach ($attribute_values1 as $attribute_value1) {
			ProductColor::updateOrCreate(
			    ['product_id' => $product_id, 'color_id' => $attribute_value1->id],
			    ['image_path' => $product->thumbnail]
			);
            // Case 1 : Only first attribute
            if( count($attribute_map) == 1 ) {
				ProductInfo::updateOrCreate(
					['product_id' => $product_id, 'attribute_value1' => $attribute_value1->id],
					[],
				);
                continue;
            }
            // Case 2 :
            foreach ($attribute_values2 as $attribute_value2) {
				ProductInfo::updateOrCreate(
					['product_id' => $product_id, 'attribute_value1' => $attribute_value1->id,'attribute_value2'=>$attribute_value2->id],
					[],
				);
            }
        }
        return true;
    }

}
