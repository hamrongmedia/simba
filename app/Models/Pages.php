<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{

    protected $table = 'pages';
    protected $fillable = [
        'title', 'slug', 'content', 'description', 'status', 'tags', 'meta_des', 'meta_key', 'meta_title',
    ];

}