<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery_images extends Model
{
    use HasFactory;
    protected $table = 'gallery_images';
    protected $fillable = [
        'title',
        'image'
    ];
    public function scopeSearch($query, $value)
    {
        $query->where('title', 'like', "%{$value}%");
    }
}
