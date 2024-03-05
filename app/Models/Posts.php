<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'image',
        'description',
        'author',
    ];
    public function scopeSearch($query, $value)
    {
        $query->where('title', 'like', "%{$value}%")->orwhere('content', 'like', "%{$value}%");
    }
}
