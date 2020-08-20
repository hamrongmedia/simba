<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    const IS_PUBLISHED = 1;

    protected $fillable = ['customer_name', 'customer_email', 'customer_phone', 'comment', 'customer_id', 'star', 'product_id'];

    protected $table = 'product_reviews';

    protected $timestamp = true;

    public function answer()
    {
        return $this->hasOne('App\Models\ProductReviewAnswer');
    }
}