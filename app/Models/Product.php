<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'store_id',
        'code',
        'price',
        'stok',
        'name',
        'image',
        'description',
    ];


    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->code = 'Product-' . Str::random(10);
        });
    }
    public function store()
    {

        return $this->belongsTo(Store::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function getImage()
    {
        return Storage::url('images/' . $this->image);
    }
}
