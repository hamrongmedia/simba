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
					->leftJoin('product_attribute_values as pav1','order_items.attribute_value1','=','pav1.id')
					->leftJoin('product_attribute_values as pav2','order_items.attribute_value2','=','pav2.id')
					->where('order_code',$order_code)
					->select(
						'orders.*',
						'products.thumbnail',
						'products.name',
						'products.type',
						'products.slug as product_slug',
						'order_items.quantity',
						'order_items.price',
                        'pav1.id as pav1_id',
                        'pav1.value as pav1_value',
                        'pav2.id as pav2_id',
                        'pav2.value as pav2_value'
					)
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
					->leftJoin('product_attribute_values as pav1','order_items.attribute_value1','=','pav1.id')
					->leftJoin('product_attribute_values as pav2','order_items.attribute_value2','=','pav2.id')
					->where('orders.id',$order_id)
					->select(
						'orders.*',
						'products.thumbnail',
						'products.name',
						'products.type',
						'products.slug as product_slug',
						'order_items.quantity',
						'order_items.price',
                        'pav1.id as pav1_id',
                        'pav1.value as pav1_value',
                        'pav2.id as pav2_id',
                        'pav2.value as pav2_value'
					)
					->get();
		return $datas;
	}

}
