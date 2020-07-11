<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductToCategory;

class Product extends Model
{
    const PUBLISHED = 1;
    const PENDING = 0;
    const DRAFT = 2;

    /**
     * @var bool
     */
    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'price',
        'sale_price',
        'thumbnail',
        'type',
        'status',
        'delete_flag',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     * @author
     */
    public function productImage()
    {
        return $this->hasMany(ProductImage::class);
    }


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
