<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "product_attributes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name', 
    	'slug', 
    	'description', 
    	'status', 
    	'is_deleted'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at'  => 'date:d/m/Y',
        'updateted_at'  => 'date:d/m/Y',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     * @author Bao Do
     */
    public function attributeValues(){
        return $this->hasMany(ProductAttributeValue::class, 'attribute_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author Baodv
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attribute_map','product_attribute_id','product_id');
    }
}
