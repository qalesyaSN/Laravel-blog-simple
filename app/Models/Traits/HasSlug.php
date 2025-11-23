<?php
namespace App\Models\Traits;

use Illuminate\Support\Str;

trait HasSlug {
    protected static function bootedHasSlug(): void {
        static::created(function($model){
            $fields = $model->title ?? $model->name;
            $model->slug = Str::slug($fields).'-'.$model->id;
            $model->saveQuietly();
        });
    }
    
    public static function bootHasSlug() {
        static::bootedHasSlug();
    }
}
