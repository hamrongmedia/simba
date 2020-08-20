<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductToCategory;

class Product extends Model
{
    const PUBLISHED = 1;
    const PENDING = 0;
    const DRAFT = 2;

    const PRODUCT_STANDARD = 1;
    const PRODUCT_ATTRIBUTE = 2;

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
        'product_code',
        'stock',
        'thumbnail',
        'type',
        'status',
        'is_deleted',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     * @author
     */
    public function productImage()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author Baodv
     */
    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_to_categories','product_id','category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author Baodv
     */
    public function productAttributes()
    {
        return $this->belongsToMany(ProductAttribute::class, 'product_attribute_map','product_id','product_attribute_id');
    }
    
    public function getCategories(){
        $categories = ProductToCategory::where('product_id', $this->id)->get();
        $list = [];
        foreach($categories as $category){
            $list[] = $category->category_id;
        }
        return $list;
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Post $post) {
            $post->categories()->detach();
        });
    }
}
