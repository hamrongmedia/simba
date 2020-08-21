<?php

namespace App\Repositories\Cart;

use App\Repositories\RepositoryInterface;

/**
 * Interface CartRepository.
 *
 * @package namespace App\Repositories\Cart;
 */
interface CartRepository extends RepositoryInterface {
	
	public function getListItemCart($request, $cart_key, $user);
}
