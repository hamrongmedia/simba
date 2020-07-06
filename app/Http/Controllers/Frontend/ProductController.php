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
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function getDetailProduct($slug) {
        // $product = Product::where('status',1)->where('slug', $slug)->first();
        $product = Product::where('slug', $slug)->first();

        if($product == null) abort(404);
        return view('front-end.product.detail')->with(compact(['product']));;
    }

}
