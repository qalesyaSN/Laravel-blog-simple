<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'setting_key',
        'setting_value',
        'description',
        ];
        
    protected static $settings = null;
    
    public static function get($key, $default = null) {
        if(self::$settings === null){
            self::$settings = self::pluck('setting_value', 'setting_key')->toArray();
        }
        return self::$settings[$key] ?? $default;
    }
}
