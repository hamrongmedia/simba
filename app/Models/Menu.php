<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = ['title', 'icon', 'link', 'parent_id', 'sort'];

    public function parent()
    {
        return $this->belongsTo('App\Models\Menu');
    }

    public function child()
    {
        return $this->hasMany('App\Models\Menu', 'parent_id', 'id');
    }
}