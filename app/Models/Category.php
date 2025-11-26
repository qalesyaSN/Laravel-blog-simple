<?php

namespace App\Models;

use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use HasFactory, HasSlug;
    protected $fillable = [
        'name',
        'status'
        ];
    
    protected static function booted() {
        static::deleting(function($category) {
            $category->post()->update([
                'category_id' => null,
                'status'      => 'Archived'
                ]);
        });
    }
    
    public function post() {
        return $this->hasMany(Post::class);
    }
}
