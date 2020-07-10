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
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     * @author Bao Do
     */
    public function attributeValues(){
        return $this->hasMany(ProductAttributeValue::class, 'attribute_id', 'id');
    }
}
