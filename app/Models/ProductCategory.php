<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = "product_categories";
    protected $fillable = ['name', 'description', 'slug', 'parent_category', 'meta_keyword', 'meta_title', 'meta_description', 'status', 'is_deleted', 'view'];

    public function parentCategory(){
        return $this->belongsTo('App\Models\ProductCategory', 'parent_category', 'id');
    }

    public function subCategory(){
        return $this->hasMany('App\Models\ProductCategory', 'parent_category', 'id');
    }
}
