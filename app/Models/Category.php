<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'active'];

    // Quan hệ nhiều 1 (hasMany <--> belongsTo)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
