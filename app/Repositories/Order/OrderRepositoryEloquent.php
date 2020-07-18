<?php

namespace App\Repositories\Order;

use App\Repositories\BaseRepository;
use App\Repositories\Order\OrderRepository;
use App\Models\Order;
use App\Models\AgencyProductDiscount;
use Carbon\Carbon;
/**
 * Class OrderRepositoryEloquent.
 *
 * @package namespace App\Repositories\Order;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository {

	const TAKE = 10;
  /**
	* Specify Model class name
	*
	* @return string
	*/
  public function getModel()
  {
    return Order::class;
  }

  /**
	* Specify Model class name
	*
	* @return string
	*/
	public function getOrderByOrderCode($order_code)
	{
		$datas = Order::join('order_items','orders.id','=','order_items.order_id')
					->join('products','order_items.product_id','=','products.id')
					->where('order_code',$order_code)
					->select('orders.*','products.thumbnail','products.name','order_items.quantity','order_items.price')
					->get();
		return $datas;
	}

  /**
	* Specify Model class name
	*
	* @return string
	*/
	public function getDetailOrder($order_id)
	{
		$current_date = Carbon::now(config('app.timezone'))->toDateString();
		$datas = Order::join('order_items','orders.id','=','order_items.order_id')
					->join('products','order_items.product_id','=','products.id')
					->join('agencies','orders.agency_id','=','agencies.id')
					->select('orders.*',
						'products.thumbnail',
						'products.name',
						'products.product_code',
						'products.unit',
						'order_items.quantity',
						'order_items.price',
						'agencies.agency_code',
						'agencies.fullname as agency_name'
					)
					->where('orders.id',$order_id)
					->get();
		return $datas;
	}

}
