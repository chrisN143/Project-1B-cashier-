<?php

namespace App\Livewire\Menu;

use Livewire\Component;
use App\Models\Product;
use App\Models\Store;
use App\Models\Cart;

class MenuIndex extends Component
{
    public $stores;
    public $product;
    public $carts;
    public $inputquantity = 0;

    public function add()
    {
        Cart::create([
            'user_id' => User::where('id', auth()->id())->get(),
            'quantity' => $this->inputquantity,
            'product_id' => 
        ]);
    }

    public function mount()
    {
        $this->stores = Store::All();
        $this->product = Product::All();
        $this->carts = Cart::where('user_id', auth()->id())->get();

    }

    public function render()
    {
        return view('livewire.menu.menu-index');
    }
}
