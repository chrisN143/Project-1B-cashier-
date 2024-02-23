<?php

namespace App\Livewire\Menu;

use Livewire\Attributes\Reactive;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;
use App\Models\Store;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class MenuIndex extends Component
{


    public $stores;
    public $product;
    public $carts;
    private $inputquantity = 1;
    public $cartUser;
    // protected

    public function add($id)
    {
        if ($this->inputquantity >= 0) {
            if (Auth::check()) {
                if (Product::where('id', $id)->exists()) {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $id)->exists()) {
                        session()->flash('status', 'Product already added');
                    } else {
                        Cart::create([
                            'user_id' => auth()->user()->id,
                            'quantity' => $this->inputquantity,
                            'product_id' => $id
                        ]);
                        session()->flash('status', 'Product added to cart!');
                    }
                }
            }
        }
    }
    public function cartCount()
    {
        if (Auth::check()) {
            return $this->cartUser = Cart::where('user_id', auth()->user()->id)->count();
        } else {
            return $this->cartUser = 0;
        }
    }

    public function mount()
    {
        $this->stores = Store::All();
        $this->product = Product::All();
        $this->carts = Cart::where('user_id', auth()->id())->get();
    }



    public function render()
    {
        $this->cartUser = $this->cartCount();
        return view('livewire.menu.menu-index', [
            'cartUser' => $this->cartUser
        ]);
    }
}
