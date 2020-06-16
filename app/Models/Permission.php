<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    public function actions()
    {
        return $this->belongsToMany('App\Models\Action', 'permission_has_action');
    }
}