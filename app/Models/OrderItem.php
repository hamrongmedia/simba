<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
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
    protected $table = 'order_items';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     * @author Bao Do
     */
    public function order()
    {
        return $this->belongsTo('App\Models\OrderItem');
    }
}
