<?php

namespace App\Repositories\OrderItem;

use App\Repositories\BaseRepository;
use App\Repositories\OrderItem\OrderItemRepository;
use App\Models\OrderItem;

/**
 * Class OrderItemRepositoryEloquent.
 *
 * @package namespace App\Repositories\OrderItem;
 */
class OrderItemRepositoryEloquent extends BaseRepository implements OrderItemRepository {

	const TAKE = 10;
  /**
	* Specify Model class name
	*
	* @return string
	*/
  public function getModel()
  {
    return OrderItem::class;
  }

  /**
	* Specify Model class name
	*
	* @return string
	*/


}
