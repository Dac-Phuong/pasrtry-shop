<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'payment_method',
        'total_money',
        'customer_id',
        'province_id',
        'district_id',
        'ward_id',
        'note',
        'status',
    ];
    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")->orwhere('email', 'like', "%{$value}%")->orwhere('phone', 'like', "%{$value}%");
    }
    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function provinces()
    {
        return $this->belongsTo(Provinces::class, 'province_id');
    }
    public function districts()
    {
        return $this->belongsTo(Districts::class, 'district_id');
    }
    public function wards()
    {
        return $this->belongsTo(Wards::class, 'ward_id');
    }
}
