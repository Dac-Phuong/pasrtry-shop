<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'sale',
        'price',
        'image',
        'gallery_images',
        'description',
        'category_id',
        'number_sold',
        'type',
        'status',
    ];
    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")->orwhere('price', 'like', "%{$value}%")->orwhere('sale', 'like', "%{$value}%");
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
