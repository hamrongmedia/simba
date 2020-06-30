<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    //
    protected $table = "product_attributes";
    protected $fillable = ['name', 'slug', 'description', 'status', 'is_deleted'];

    public function values(){
        return $this->hasMany('App\Models\ProductAttributeValue', 'attribute_id', 'id');
    }
}
