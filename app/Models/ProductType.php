<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    protected $table = "product_types";
    protected $fillable = ['name', 'description', 'slug', 'meta_keyword', 'meta_title', 'meta_description', 'status', 'is_deleted'];
}
