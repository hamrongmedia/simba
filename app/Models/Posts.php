<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    protected $table = 'posts';
    protected $fillable = [
        'title', 'slug', 'image', 'content', 'description', 'status', 'tags', 'meta_des', 'meta_key', 'meta_title',
    ];

    public function category()
    {
        return $this->belongsToMany('App\Models\PostCategory', 'post_has_categories', 'post_id', 'category_id');
    }

    public function category_id()
    {
        $result = [];
        foreach ($this->category as $cat) {
            array_push($result, $cat->id);
        }
        return $result;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function setImageAttribute($value)
    {
        $tmp = $value;
        if ($tmp != null && $tmp != "") {
            $index = strpos($tmp, 'FILES/source/');
            if (!$index === false) {
                $tmp = substr($tmp, $index, strlen($tmp));
            }
        }
        $this->attributes['image'] = $tmp;
    }

    public function getImageAttribute()
    {
        $tmp = $this->attributes['image'];
        if ($tmp != null && $tmp != "") {
            $tmp = config('admin.base_url') . $tmp;
        }
        return $tmp;
    }

    public function getArrayTagAttribute()
    {
        $res = [];
        $tmp = $this->attributes['tags'];
        if ($tmp != null && $tmp != "") {
            $res = explode(";", $tmp);
        }
        return $res;
    }
}