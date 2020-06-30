<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    //
    protected $table = "product_attribute_values";
    protected $fillable = ['attribute_id', 'value'];
}
