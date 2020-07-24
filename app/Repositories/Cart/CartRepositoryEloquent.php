<?php

namespace App\Repositories\Cart;

use App\Repositories\BaseRepository;
use App\Repositories\Cart\CartRepository;
use App\Models\Cart;
use App\Models\CartItem;
/**
 * Class CartRepositoryEloquent.
 *
 * @package namespace App\Repositories\Cart;
 */
class CartRepositoryEloquent extends BaseRepository implements CartRepository {

	const TAKE = 10;
  	/**
	* Specify Model class name
	*
	* @return string
	*/
	public function getModel()
	{
		return Cart::class;
	}

  	/**
	* Specify Model class name
	*
	* @return string
	*/
	public function getListItemCart($request, $car_key , $user = null)
	{
		$conditions = Cart::join('cart_items as ct','carts.id','=','ct.cart_id')
					->join('products as p','p.id','=','ct.product_id')
					->leftJoin('product_attribute_values as pav1','ct.attribute_value1','=','pav1.id')
					->leftJoin('product_attribute_values as pav2','ct.attribute_value2','=','pav2.id');
		if($user) {
			$conditions = $conditions->where('carts.user_id', $user->id);
		} else {
			$conditions = $conditions->where('carts.cart_key', $car_key);
		}
		$conditions = $conditions->select(
						'ct.id',
						'ct.product_id',
						'p.slug as product_slug',
						'ct.quantity',
						'ct.price',
						'p.thumbnail',
						'p.name',
						'p.type',
                        'pav1.id as pav1_id',
                        'pav1.value as pav1_value',
                        'pav2.id as pav2_id',
                        'pav2.value as pav2_value',
						'p.product_code'
					);
		$datas = $conditions->get();
		return $datas;
	}
}
