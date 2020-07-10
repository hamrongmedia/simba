<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    const STATUS_PENDING = 1;
    const STATUS_DELIVERY = 2;
    const STATUS_SUCCESS = 3;
    const STATUS_CANCEL = 4;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_status';
    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     * @author Bao Do
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
