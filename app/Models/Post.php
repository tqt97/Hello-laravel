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

    private $check = '<svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5 text-green-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4.5 12.75l6 6 9-13.5" />
                                                </svg>';
    private $xMark = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>';

    public function getActive(): string
    {
        if (
            $this->attributes['active'] == 1
        ) {
            return $this->check;
        } else {
            return $this->xMark;
        }
    }

    public function getFeature(): string
    {
        if ($this->attributes['feature'] == 1) {
            return $this->check;
        } else {
            return $this->xMark;
        }
    }
}
