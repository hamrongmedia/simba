<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    /**
     * @var bool
     */
    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'image_file',
        'attribute_value1',
        'sort_order'
    ];


    /**
     * @return hasOne
     * @author
     */
    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
