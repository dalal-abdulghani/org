<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkField extends Model
{
    use HasFactory;

    protected $fillable = ['name','cover_image', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
