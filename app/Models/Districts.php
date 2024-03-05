<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;
    protected $table = 'districts';

    protected $fillable = [
        'name',
        'province_id',
    ];
    public function provinces()
    {
        return $this->belongsTo(Provinces::class, 'province_id');
    }
    public function wards()
    {
        return $this->belongsTo(Wards::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
