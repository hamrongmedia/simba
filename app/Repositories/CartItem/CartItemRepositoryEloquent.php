<?php

namespace App\Repositories\CartItem;

use App\Repositories\BaseRepository;
use App\Repositories\CartItem\CartItemRepository;
use App\Models\CartItem;

/**
 * Class CartItemRepositoryEloquent.
 *
 * @package namespace App\Repositories\CartItem;
 */
class CartItemRepositoryEloquent extends BaseRepository implements CartItemRepository {

	const TAKE = 10;
  /**
	* Specify Model class name
	*
	* @return string
	*/
  public function getModel()
  {
    return CartItem::class;
  }

  /**
	* Specify Model class name
	*
	* @return string
	*/


}
