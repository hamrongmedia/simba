<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_category';
    protected $fillable = [
        'name', 'slug', 'cat_id', 'description', 'status',
    ];

    protected $appends = ['parent', 'child'];

    // public function getParentAttribute()
    // {
    //     $cat_id = $this->attributes['cat_id'];
    //     $res = null;
    //     if (isset($cat_id)) {
    //         $res = Category::find($cat_id);
    //     }
    //     return $res;
    // }

    // public function getChildsAttribute()
    // {
    //     $_id = $this->attributes['cat_id'];
    //     $res = null;
    //     if (isset($cat_id)) {
    //         $res = Category::where('cat_id', $_id)->where('status', 1)->get();
    //     }
    //     return $res;
    // }

    public function child()
    {
        return $this->hasMany('App\Models\PostCategory');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\PostCAtegory', 'cat_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'cat_id');
    }
}