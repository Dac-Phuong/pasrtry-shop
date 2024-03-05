<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    use HasFactory;
    protected $table = 'provinces';

    protected $fillable = [
        'name',
    ];
    public function districts()
    {
        return $this->belongsTo(Districts::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
