<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;
    protected $table = 'wards';

    protected $fillable = [
        'district_id',
        'name',
    ];
    public function districts()
    {
        return $this->belongsTo(Districts::class, 'district_id');
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
