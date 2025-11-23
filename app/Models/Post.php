<?php

namespace App\Models;

use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use HasFactory, HasSlug;
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
        'thumbnail',
        'status',
        ];
        
    
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
