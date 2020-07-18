<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

/**
 * Interface ProductRepository.
 *
 * @package namespace App\Repositories\Product;
 */
interface ProductRepository extends RepositoryInterface {

    public function index($request);

	public function show( $request, $slug );

    public function getProductCatalog($request, $catalog_id);

}
