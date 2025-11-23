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
    
    public function post() {
        return $this->hasMany(Post::class);
    }
}
