<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content','cover_image', 'likes_count'];



    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function shares()
    {
        return $this->hasMany(Share::class);
    }
}
