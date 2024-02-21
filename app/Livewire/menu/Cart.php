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
        $cartUser = CartUser::where('id', $id);
        $cartUser->delete();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.menu.cart');
    }
}
