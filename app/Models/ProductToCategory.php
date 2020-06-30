<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductToCategory extends Model
{
    //
    protected $table = "product_to_categories";
    protected $fillable = ['product_id', 'category_id', 'status', 'is_deleted'];
}
