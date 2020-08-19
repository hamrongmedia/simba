<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReviewAnswer extends Model
{
    protected $fillable = ['author_id', 'product_review_id', 'answer'];

    protected $table = 'product_reviews_answer';

    protected $timestamp = true;
}