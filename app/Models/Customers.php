<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'password',
    ];
    public function scopeSearch($query, $value)
    {
        $query->where('full_name', 'like', "%{$value}%")->orwhere('email', 'like', "%{$value}%")->orwhere('phone', 'like', "%{$value}%");
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
