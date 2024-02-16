<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Detail extends Component
{
    public $objId;

    public $name;
    public $price;
    public $number;

    public function mount()
    {
        if ($this->objId) {
            $product = Product::find($this->objId);
            $this->name = $product->name;
            $this->price = $product->price;
            $this->number = $product->number;
        }
    }

    public function store()
    {
        if ($this->objId) {
            //Update
            $product = Product::find($this->objId);
            $product->update([
                'name' => $this->name,
                'price' => $this->price,
                'number' => $this->number,
            ]);
        } else {
            //Create 
            Product::create([
                'name' => $this->name,
                'price' => $this->price,
                'number' => $this->number,
            ]);
        }

        return redirect()->route('product.index');
    }

    public function render()
    {
        return view('livewire.product.detail');
    }
}
