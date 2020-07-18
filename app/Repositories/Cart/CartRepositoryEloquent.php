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
	public function getListItemCart($request, $agency)
	{
		$datas = Cart::join('cart_items as ct','carts.id','=','ct.cart_id')
					->join('products as p','p.id','=','ct.product_id')
					->where('carts.agency_id', $agency->id)
					->select('ct.id','ct.product_id','ct.quantity','ct.price','p.thumbnail','p.name','p.product_code','p.unit')
					->get();
		return $datas;
	}
}
