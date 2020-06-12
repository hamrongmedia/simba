<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
   	protected $fillable = [
        'title', 'slug', 'image' ,'content','description', 'cat_id', 'status' , 'tags', 'meta_des', 'meta_key', 'meta_title',
    ];

    public function category()
    {
        return $this->belongsTo('App\Admin\Category','cat_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function setImageAttribute($value) {
    	$tmp = $value;
    	if ($tmp != null && $tmp != "") {
    		$index = strpos($tmp,'FILES/source/');
    		if (!$index === false) {
    			$tmp = substr($tmp,$index, strlen($tmp));
    		}
    	}
    	$this->attributes['image'] = $tmp;
    }

    public function getImageAttribute() {
    	$tmp = $this->attributes['image'];
    	if ($tmp != null && $tmp != "") {
    		$tmp = config('admin.base_url').$tmp;
    	}
    	return $tmp;
    }

    public function getArrayTagAttribute() {
        $res = [];
        $tmp = $this->attributes['tags'];
        if ($tmp != null && $tmp != "") {
            $res = explode(";", $tmp);
        }
        return $res;
    }
}
