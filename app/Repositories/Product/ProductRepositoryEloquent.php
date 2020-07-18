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
    public function getProductCatalog($request, $catalog_id)
    {
        if (!is_array($catalog_id)) {
            $catalog_id = [$catalog_id];
        }
        $data = $this->model
            ->join('product_catalog','product_catalog.product_id','products.id')
            ->join('catalogs','product_catalog.catalog_id','catalogs.id')
            ->whereIn('product_catalog.catalog_id',$catalog_id)
            ->select('products.*')
            ->distinct()
            ->orderBy('products.created_at', 'desc')
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
