<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // Những trường được cho phép
    protected $fillable = ['title', 'slug', 'user_id', 'image', 'category_id', 'description', 'active', 'feature'];
    /**
     * Có thể dùng
     * protected $guarded = ['']; // Những trường không được cho phép
     * để thay thế $fillable
     */

     // Quan hệ 1 nhiều
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Quan hệ 1 nhiều
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
