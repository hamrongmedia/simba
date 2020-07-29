<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @var bool
     */
    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     * @author Bao Do
     */
    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     * @author Bao Do
     */
    public function customer()
    {
        return $this->hasOne('App\Models\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     * @author Bao Do
     */
    public function orderStatus()
    {
        return $this->hasOne('App\Models\OrderStatus', 'id', 'order_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     * @author Bao Do
     */
    public function paymentMethod()
    {
        return $this->hasOne('App\Models\PaymentMethod', 'id', 'payment_method_id');
    }
}