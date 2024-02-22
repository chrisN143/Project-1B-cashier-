<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Product;

class Cart extends Model
{

    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'payment_id',
        'user_id',
        'quantity',
        'product_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
     public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
