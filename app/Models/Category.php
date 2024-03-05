<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'image',
        'description',
        'status',
    ];
    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")->orwhere('description', 'like', "%{$value}%");
    }
    public function products()
    {
        return $this->belongsTo(Products::class);
    }
   
}
