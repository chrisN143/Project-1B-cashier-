<?php

namespace App\Livewire\menu;

use Livewire\WithPagination;

use App\Models\Cart as CartUser;
use Livewire\Component;

class Cart extends Component
{
    use WithPagination;
    public $carts;

    public function mount()
    {
        $this->carts = CartUser::where('user_id', auth()->id())->get();
    }

    public function destroy($id)
    {
        $cartData = CartUser::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            $cartData->delete();
            session()->flash('status', 'Cart Item Removed Succesfully!');
        } else {
            session()->flash('error', 'Something wrong!');
        }
        // $this->resetPage();  
    }
    public function decrementQuantity($id)
    {
        $cartData = CartUser::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if ($cartData && $cartData->quantity > 0) {
            $cartData->decrement('quantity');
            session()->flash('status', 'Quantity Updated!');
        } else {
            session()->flash('error', 'Something wrong! Product quantity can\'t goes below 1');
        }
    }

    public function incrementQuantity($id)
    {
        $cartData = CartUser::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            $cartData->increment('quantity');
            session()->flash('status', 'Quantity Updated!');
        } else {
            session()->flash('error', 'Something wrong!');
        }
    }
    public function render()
    {
        return view('livewire.menu.cart');
    }
}
