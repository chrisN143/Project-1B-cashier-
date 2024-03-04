<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'order_code',
        'user_id',
        'customer_name',
        'status_message',
        'total_price',
        'payment_method',
        'payment_id'
    ];
    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->order_code = 'Order-' . Str::random(10);
        });
        static::deleted(function ($model) {
            $model->orderItems = null;
        });
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }
}
