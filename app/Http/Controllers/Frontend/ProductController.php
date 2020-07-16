<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ThemeOptions;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function getDetailProduct($slug)
    {
        // $product = Product::where('status',1)->where('slug', $slug)->first();
        $product = Product::where('slug', $slug)->first();
        $product_setting = ThemeOptions::where('key', 'product')->first();
        if ($product == null) {
            abort(404);
        }

        return view('front-end.product.detail')->with([
            'product' => $product,
            'product_setting' => $product_setting,
        ]);
    }

    /**
     * Get product by category
     * @param string $product_category_slug Category slug
     *
     */
    public function getProductByCategory($product_cat_slug)
    {
        $slug = $product_cat_slug;
        return view('front-end.page.product_category', );
    }

}