<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingStatus extends Model
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
    protected $table = 'shipping_status';
    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_deleted'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     * @author Bao Do
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
