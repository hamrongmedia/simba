<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductInfo;
use App\Models\ThemeOptions;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Models\Product;
use App\Repositories\Product\ProductRepository;
class ProductController extends Controller
{
    const TAKE = 15;
    const ORDERBY = 'desc';
    
    /**
     * @var request
     */
    protected $request;
    
    /**
     * @var productRepository
     */
    protected $productRepository;

    public function __construct(
        Request $request,
        ProductRepository $productRepository
    )
    {
        $this->request = $request;
        $this->productRepository = $productRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        # Case Product Attribute
        if($product->type == Product::PRODUCT_ATTRIBUTE) {
            $attributes = ProductInfo::leftJoin('product_attribute_values as pav1', 'product_info.attribute_value1', '=', 'pav1.id')
                        ->leftJoin('product_attribute_values as pav2', 'product_info.attribute_value2', '=', 'pav2.id')
                        ->leftJoin('product_color as pc','product_info.attribute_value1','=','pc.color_id')
                        ->distinct('product_info.attribute_value1')
                        ->where('product_info.product_id',$product->id)
                        ->select(
                            'pav1.id as pav1_id',
                            'pav1.value as pav1_value',
                            'pav2.id as pav2_id',
                            'pav2.value as pav2_value',
                            'image_path'
                        )
                        ->get()->toArray();
            $product_attributes = [];
            $collection = new Collection($attributes);
            $genera = $collection->groupBy('pav1_id');
            $all_sizes = [];
            foreach ($genera as $key => $value) {
                $group_pav2 = [];
                $sizeids = '';
                foreach ($value as $k => $v) {
                    if($v['pav2_id']) {
                        $group_pav2[$k]['id'] = $v['pav2_id'];
                        $group_pav2[$k]['name'] = $v['pav2_value'];
                    }
                    $sizeids.='|'.$v['pav2_id'];
                    $all_sizes[$v['pav2_id']] =  $v['pav2_value'];
                }
                $product_attributes[$key]['pav1_id'] = $key;
                $product_attributes[$key]['pav1_name'] = $value[0]['pav1_value'];
                $product_attributes[$key]['image_path'] = $value[0]['image_path'];
                $product_attributes[$key]['sizeids'] = $sizeids;
                $product_attributes[$key]['group_pav2'] = $group_pav2;
            }
            $product->all_sizes = $this->array_unique_multidimensional($all_sizes);
            $product->product_attributes = $product_attributes;
        }
        $product_setting = ThemeOptions::where('key', 'product')->first();
        $datas = $this->productRepository->getProductRelated($this->request, $product->id);
        return view('front-end.product.detail',compact('product','product_setting','datas'));
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

    public function array_unique_multidimensional($input)
    {
        $serialized = array_map('serialize', $input);
        $unique = array_unique($serialized);
        return array_intersect_key($input, $unique);
    }

}