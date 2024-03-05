<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'product_name',
        'product_image',
        'quantity',
        'total_money',
        'order_id',
        'product_id',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
