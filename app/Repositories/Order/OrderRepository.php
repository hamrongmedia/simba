<?php

namespace App\Repositories\Order;

use App\Repositories\RepositoryInterface;

/**
 * Interface OrderRepository.
 *
 * @package namespace App\Repositories\Order;
 */
interface OrderRepository extends RepositoryInterface {

	public function getOrderByOrderCode($order_code);

	public function getDetailOrder($order_id);
}
