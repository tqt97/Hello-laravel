<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
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

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
