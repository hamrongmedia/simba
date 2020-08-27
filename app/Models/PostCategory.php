<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_category';
    protected $fillable = [
        'name', 'slug', 'cat_id', 'description', 'status',
    ];

    public function child()
    {
        return $this->hasMany('App\Models\PostCategory')->orderByDesc('id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\PostCAtegory', 'cat_id', 'id');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Posts', 'post_has_categories', 'category_id', 'post_id');
    }
}