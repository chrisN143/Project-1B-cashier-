<?php

namespace App\Livewire\Menu;

use Livewire\Attributes\Reactive;

use Livewire\WithPagination;
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

    public function add($id)
    {
        Cart::create([
            'user_id' => auth()->id(),
            'quantity' => $this->inputquantity,
            'product_id' => $id
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
