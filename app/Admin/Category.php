<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{ 
    protected $table = 'category';
    protected $fillable = [
        'name', 'slug', 'cat_id', 'description', 'status',
    ];

    protected $appends = ['parent', 'child'];

    public function getParentAttribute()
    {
        $cat_id = $this->attributes['cat_id'];
        $res = null;
        if(isset($cat_id)){
        	$res = Category::find($cat_id);
        }
        return $res;
    }

    public function getChildsAttribute()
    {
        $_id = $this->attributes['cat_id'];
        $res = null;
        if(isset($cat_id)){
            $res = Category::where('cat_id',$_id)->where('status',1)->get();
        }
        return $res;
    }

    public function posts()
    {
        return $this->hasMany('App\Admin\Post','cat_id');
    }
}
