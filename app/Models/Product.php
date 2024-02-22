<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'store_id',
        'code',
        'price',
        'name',
        'image',
        'description',
    ];
  
    public function store()
    {
<<<<<<< HEAD
=======
        return $this->belongsTo(Store::class);
    }
<<<<<<< HEAD
    public function cart(){
        return $this->hasMany(Cart::class);

>>>>>>> origin/main
    }

=======
>>>>>>> origin/main
    public function getImage()
    {
        return Storage::url('images/' . $this->image);
    }
}
