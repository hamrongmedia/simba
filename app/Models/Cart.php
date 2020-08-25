<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
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
    protected $table = 'carts';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     * @author Bao Do
     */
    public function cartItems()
    {
        return $this->hasMany('App\CartItem')->orderByDesc('id');
    }
}