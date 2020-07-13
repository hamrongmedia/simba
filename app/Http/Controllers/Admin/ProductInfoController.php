<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductInfo;

class ProductInfoController extends Controller
{
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
