<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\Store;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Show extends Component
{
    public $objId;
    public $oldImage;
    public $store;
    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $price;
    #[Rule('required')]

    public $stok;
    #[Rule('required')]
    public $store_id;
    #[Rule('nullable|sometimes|image|max:6140')]
    public $image;
    #[Rule('required')]
    public $description;
    public function mount()
    {
        $this->store = Store::all();
        if ($this->objId) {
            $product = Product::find($this->objId);
            $this->name = $product->name;
            $this->price = $product->price;
            $this->oldImage = $product->getImage();
            $this->store_id = $product->store_id;
            $this->stok = $product->stok;
            $this->description = $product->description;
        }
    }
    public function render()
    {
        return view('livewire.product.show');
    }
}
