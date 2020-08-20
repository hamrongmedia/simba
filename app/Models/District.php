<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * @var bool
     */
    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'districts';
}
