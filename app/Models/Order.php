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
        return $this->hasOne(OrderStatus::class, 'id', 'order_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     * @author Bao Do
     */
    public function paymentMethod()
    {
        return $this->hasOne('App\Models\PaymentMethod', 'id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     * @author Bao Do
     */
    public function province()
    {
        return $this->hasOne(Province::class, 'id', 'province_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     * @author Bao Do
     */
    public function district()
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     * @author Bao Do
     */
    public function ward()
    {
        return $this->hasOne(Ward::class, 'id', 'ward_id');
    }
}