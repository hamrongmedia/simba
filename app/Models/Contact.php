<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = ['customer_name', 'email', 'phone', 'title', 'content', 'status'];
}