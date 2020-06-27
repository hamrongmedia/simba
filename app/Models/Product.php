<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";
    protected $fillable = ['name', 'code', 'slug', 'description', 'type_id', 'price', 'promotion_price', 'images', 'quantity', 'attribute', "meta_keyword", "meta_title", "meta_description", "status", "is_deleted", "view"];
}
