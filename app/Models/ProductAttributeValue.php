<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "product_attribute_values";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'attribute_id', 
    	'value'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at'  => 'date:d/m/Y',
        'updated_at'  => 'date:d/m/Y',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     * @author Bao Do
     */
    public function attribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}
