<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Repositories\Product\ProductRepository;
use App\Models\Product;
use App\Models\ProductCatalog;
use App\Models\ProductAttribute;
use App\Models\Attribute;
use App\Models\AttributeValue;

/**
 * Class ProductRepositoryEloquent.
 *
 * @package namespace App\Repositories\Product;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository {

	const TAKE = 3;
  /**
	* Specify Model class name
	*
	* @return string
	*/
  public function getModel()
  {
    return Product::class;
  }

  /**
	* Specify Model class name
	*
	* @return string
	*/
    public function index($request)
    {
        $data = $this->model->with('user')->paginate(self::TAKE);
        return $data;
    }
    /**
     * Specify Model class name
    *
    * @return string
    */
    public function getListProduct($request)
    {
        $data = $this->model
            ->with('productImage')
            // ->leftJoin('product_info as pi', 'products.id', '=', 'pi.product_id')
            // ->leftJoin('product_attribute_values as pav1', 'pi.attribute_value1', '=', 'pav1.id')
            // ->leftJoin('product_attribute_values as pav2', 'pi.attribute_value2', '=', 'pav2.id')
            // ->leftJoin('product_color as pc', 'pi.attribute_value1', '=', 'pc.id')
            // ->select(
            //     'products.id',
            //     'products.name',
            //     'products.slug as product_slug',
            //     'products.price',
            //     'products.sale_price',
            //     'products.thumbnail',
            //     'pav1.id as pav1_id',
            //     'pav1.value as pav1_value',
            //     'pav2.id as pav2_id',
            //     'pav2.value as pav2_value',
            //     'image_path'
            // )
            // ->selectRaw('GROUP_CONCAT(pav1.value) as colors')
            // ->selectRaw('GROUP_CONCAT(image_path) as images_path')
            // ->groupBy('products.id')
            // ->distinct()
            ->paginate(self::TAKE);
        return $data;        
    }

    /**
     * Specify Model class name
    *
    * @return string
    */
    public function getProductCatalog($request, $catalog_id)
    {
        if (!is_array($catalog_id)) {
            $catalog_id = [$catalog_id];
        }
        $data = $this->model
            ->leftJoin('product_info as pi', 'products.id', '=', 'pi.product_id')
            ->leftJoin('product_attribute_values as pav1', 'pi.attribute_value1', '=', 'pav1.id')
            ->leftJoin('product_attribute_values as pav2', 'pi.attribute_value2', '=', 'pav2.id')
            ->leftJoin('product_color as pc', 'pi.attribute_value1', '=', 'pc.id')
            ->select(
                'products.id',
                'products.name',
                'products.slug as product_slug',
                'products.price',
                'products.sale_price',
                'products.thumbnail',
                'pav1.id as pav1_id',
                'pav1.value as pav1_value',
                'pav2.id as pav2_id',
                'pav2.value as pav2_value',
                'image_path'
            )
            ->selectRaw('GROUP_CONCAT(pav1.value) as colors')
            ->selectRaw('GROUP_CONCAT(image_path) as images_path')
            ->groupBy('products.id')
            ->distinct()
            ->paginate(self::TAKE);
        return $data; 
    }

    /**
     * Specify Model class name
    *
    * @return string
    */
    public function getProductRelated($request, $product_id)
    {
        $data = $this->model
            ->leftJoin('product_info as pi', 'products.id', '=', 'pi.product_id')
            ->leftJoin('product_attribute_values as pav1', 'pi.attribute_value1', '=', 'pav1.id')
            ->leftJoin('product_attribute_values as pav2', 'pi.attribute_value2', '=', 'pav2.id')
            ->leftJoin('product_color as pc', 'pi.attribute_value1', '=', 'pc.id')
            ->select(
                'products.id',
                'products.name',
                'products.slug as product_slug',
                'products.price',
                'products.sale_price',
                'products.thumbnail',
                'pav1.id as pav1_id',
                'pav1.value as pav1_value',
                'pav2.id as pav2_id',
                'pav2.value as pav2_value',
                'image_path'
            )
            ->selectRaw('GROUP_CONCAT(pav1.value) as colors')
            ->selectRaw('GROUP_CONCAT(image_path) as images_path')
            ->groupBy('products.id')
            ->distinct()
            ->where('products.id','!=',$product_id)
            ->paginate(self::TAKE);
        return $data; 
    }

    /**
     * Specify Model class name
    *
    * @return string
    */
    public function show($request,$id)
    {
        $data = $this->model
            ->where('products.id',$id)
            ->first();
        return $data;
    }

}