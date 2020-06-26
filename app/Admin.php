<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_has_roles', 'user_id', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'user_has_permissions', 'user_id', 'permission_id');
    }

    public function getActions()
    {
        $result = [];
        $list_id = [];
        $permissions = $this->permissions;
        foreach ($permissions as $permission) {
            $actions = $permission->actions;
            foreach ($actions as $action) {
                $action_id = $action->id;
                if (!in_array($action_id, $list_id)) {
                    array_push($result, $action->name);
                    array_push($list_id, $action_id);
                }
            }
        }
        return $result;
    }

}