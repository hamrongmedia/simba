<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "product_color";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'product_id', 
    	'color_id', 
    	'image_path'
    ];
}
