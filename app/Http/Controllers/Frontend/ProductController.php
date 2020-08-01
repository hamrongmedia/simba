<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductInfo;
use App\Models\ThemeOptions;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Models\Product;
use App\Models\ProductCategory;
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
                        ->leftJoin('product_color as pc', function($join)
                        {
                            $join->on('product_info.attribute_value1', '=', 'pc.color_id');
                            $join->on('product_info.product_id','=','pc.product_id');

                        })
                        ->leftJoin('products', 'products.id', '=', 'product_info.product_id')
                        ->leftJoin('product_images as pim', function($join)
                        {
                            $join->on('products.id', '=', 'pim.product_id');
                            $join->on('pav1.id','=','pim.attribute_value1');

                        })
                        ->distinct('product_info.attribute_value1')
                        ->where('product_info.product_id',$product->id)
                        ->select(
                            'pav1.id as pav1_id',
                            'pav1.value as pav1_value',
                            'pav2.id as pav2_id',
                            'pav2.value as pav2_value',
                            'image_path',
                            'image_file'
                        )
                        ->distinct()
                        ->get()
                        ->toArray();
            $product_attributes = [];
            $collection = new Collection($attributes);
            $genera = $collection->groupBy('pav1_id');

            $all_sizes = [];
            foreach ($genera as $key => $value) {
                $group_pav2 = [];
                $image_files = [];
                $sizeids = '';
                foreach ($value as $k => $v) {
                    if($v['image_file']) {
                        $image_files[$k] = $v['image_file'];
                    }
                    if($v['pav2_id']) {
                        $group_pav2[$k]['id'] = $v['pav2_id'];
                        $group_pav2[$k]['name'] = $v['pav2_value'];
                        $sizeids.='|'.$v['pav2_id'];
                        $all_sizes[$v['pav2_id']] =  $v['pav2_value'];
                    }
                }
                $product_attributes[$key]['pav1_id'] = $key;
                $product_attributes[$key]['pav1_name'] = $value[0]['pav1_value'];
                $product_attributes[$key]['image_path'] = $value[0]['image_path'];
                $product_attributes[$key]['sizeids'] = $sizeids;
                $product_attributes[$key]['group_pav2'] = $group_pav2;
                $product_attributes[$key]['image_files'] = $image_files;
            }
            $product->all_sizes = $this->array_unique_multidimensional($all_sizes);
            $product->product_attributes = $product_attributes;
        }
        // dd($product);
        $data_product_setting = ThemeOptions::where('key', 'product')->first();
        $product_setting = json_decode($data_product_setting->value);
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
        $catalog = ProductCategory::where('slug',$product_cat_slug)->firstOrFail();
        $datas = $this->productRepository->getProductCatalog($this->request,$catalog->id);
        if($datas) {
            foreach ($datas as $data) {
                # Get Product Images 
                $img_attr = [];
                if($data->productImage) {
                    foreach ($data->productImage as $pim) {
                        $img_attr[$pim->attribute_value1][] = $pim->image_file;
                    }
                    $data->img_attr = $img_attr;
                }
            }
        }
        return view('front-end.page.product_category', compact('datas'));
    }

    public function array_unique_multidimensional($input)
    {
        $serialized = array_map('serialize', $input);
        $unique = array_unique($serialized);
        return array_intersect_key($input, $unique);
    }

}