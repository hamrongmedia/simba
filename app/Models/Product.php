<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductToCategory;

class Product extends Model
{
    //
    protected $table = "products";
    protected $fillable = ['name', 'code', 'slug', 'description', 'type_id', 'price', 'promotion_price', 'images', 'quantity', 'attribute', "meta_keyword", "meta_title", "meta_description", "status", "is_deleted", "view"];

    public function categories(){
        return $this->hasMany('App\Model\ProductToCategory', 'product_id', 'id');
    }
    
    public function getCategories(){
        $categories = ProductToCategory::where('product_id', $this->id)->get();
        $list = [];
        foreach($categories as $category){
            $list[] = $category->category_id;
        }
        return $list;
    }
}
