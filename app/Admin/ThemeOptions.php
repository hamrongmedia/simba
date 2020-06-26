<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ThemeOptions extends Model
{
    protected $fillable = [
        'key', 'value',
    ];

}
