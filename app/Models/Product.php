<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $fillable = [
    //     'code',
    //     'price',
    //     'name'
    // ];
    public function imageUrl()
    {
        return Storage::url('uploads/' . $this->image);
    }
}
