<?php

namespace App\Livewire\Menu;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $carts, $totalprice = 0;

    public function mount()
    {
        $this->totalprice = 0;
        $this->carts = Cart::where('user_id', Auth::id())->get();
        foreach ($this->carts as $Item) {
            $this->totalprice += $Item->product->price * $Item->quantity;
        }
        return $this->totalprice;
    }
    public function render()
    {
        return view('livewire.menu.checkout');
    }
}
