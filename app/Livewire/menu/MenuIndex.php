<?php

namespace App\Livewire\Menu;

use Livewire\Attributes\Reactive;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;
use App\Models\Store;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class MenuIndex extends Component
{
    use WithPagination;
    #[Url()]
    protected $queryString = ['search' => ['except' => '']];

    public $search = '';

    public $stores;
    // public $product;
    public $carts;
    private $inputquantity = 1;
    public $cartUser;
    // protected

    public function add($id)
    {
        $cart = Cart::where('product_id', $id)->first();
        if ($this->inputquantity > 0) {
            if (Auth::check()) {
                if (Product::where('id', $id)->exists()) {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $id)->exists()) {
                        $cart->update(['quantity' => $cart->quantity + 1]);
                        $this->dispatch('add');

                        session()->flash('status', 'Product already updated');
                    } else {
                        Cart::create([
                            'user_id' => auth()->user()->id,
                            'quantity' => $this->inputquantity,
                            'product_id' => $id
                        ]);
                        session()->flash('status', 'Product added to cart!');
                        $this->dispatch('add');
                    }
                }
            }
        } else {
            session()->flash('error', 'Product can not be lower than 0!');
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
        $this->carts = Cart::where('user_id', auth()->id())->get();
        $this->search = request()->query('search', $this->search);
    }



    public function render()
    {

        $products =  $this->search === null ? Product::latest()->paginate(20) : Product::latest()->where('name', 'like', '%' . $this->search . '%')->paginate(20);
        return view('livewire.menu.menu-index', [
            'products' => $products
        ]);
    }
}
