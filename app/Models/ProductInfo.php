<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "product_info";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'product_id', 
    	'attribute_value1', 
    	'attribute_value2'
    ];
}
