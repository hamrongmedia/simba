<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ThemeOptions extends Model
{
    protected $fillable = [
        'key', 'value',
    ];

    public static function get($key)
    {
        $obj = self::where('key', $key)->first();
        if ($obj == null) {
            return null;
        }
        return json_decode($obj->value);
    }

    public static function set($key, $value)
    {
        $value = json_encode($value);
        $obj = self::where('key', $key)->first();
        if ($obj == null) {
            self::create(['key' => $key, 'value' => $value]);
        } else {
            $obj->update(['key' => $key, 'value' => $value]);
        }
    }

}