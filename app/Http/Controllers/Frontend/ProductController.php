<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\ProductCategory;
use App\Models\ProductToCategory;
use App\Models\ProductType;
use App\Models\ThemeOptions;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function getDetailProduct($slug) {
        // $product = Product::where('status',1)->where('slug', $slug)->first();
        $product = Product::where('slug', $slug)->first();
        $product_setting = ThemeOptions::where('key', 'product')->first();
        dd($product_setting);
        if($product == null) abort(404);
        return view('front-end.product.detail')->with([
            'product' =>$product,
            'product_setting' =>$product_setting
        ]);
    }

}
