<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'customer_name',
        'status_message',
        'total_price',
        'payment_method',
        'payment_id'
    ];
    public function orderItems(){
        return $this->hasMany(OrderItems::class, 'order_id', 'id');

    }
}
