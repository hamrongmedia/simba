<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductToCategory;
use App\Models\ProductAttributeMap;
use App\Models\ProductInfo;
use App\Models\ProductColor;
use Log;
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

    /**
     * @param Request $request
     * @param Product $product
     *
     * @return mixed|void
     */
    public function storeProductAttributeMap(Request $request,Product $product)
    {
        $added_attributes = $request->input('added_attributes',[]);
        if (!empty($added_attributes) && $request->input('type') == Product::PRODUCT_ATTRIBUTE) {
            # Get Key : Get Attributes
            $attributes = array_keys($added_attributes);
            $product->productAttributes()->detach();
            foreach ($attributes as $attribute) {
                $product->productAttributes()->attach($attribute);
            }
            # Get Value : Get Attribute Value;
            $attribute_values = array_values($added_attributes);
            $product_info = New ProductInfo();
            $product_info->product_id = $product->id;
            $product_info->attribute_value1 = $attribute_values[0];
            if(count($attribute_values) == 2) {
                $product_info->attribute_value2 = $attribute_values[1];
            }
            $product_info->save();

            # Save Product Color 
            $product_color = new ProductColor;
            $product_color->product_id = $product->id;
            $product_color->color_id = $attribute_values[0];
            $product_color->image_path = $product->thumbnail;
            $product_color->save();
        }
        return true;
    }

}
