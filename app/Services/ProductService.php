<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductToCategory;

class ProductService
{
    /**
     * @param Request $request
     * @param Product $product
     *
     * @return mixed|void
     */
    public function storeProductCategory(Request $request,Product $product)
    {
        $categories = $request->input('categories');
        if (!empty($categories)) {
            $product->categories()->detach();
            foreach ($categories as $category) {
                $product->categories()->attach($category);
            }
        }
    }

}
