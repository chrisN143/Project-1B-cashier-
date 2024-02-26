<?php

namespace App\Livewire\Menu;

use Livewire\Attributes\Reactive;
use Livewire\Attributes\Url;
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
        if ($this->inputquantity > 0) {
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
        }else {
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


    public function increment()
    {
        // if ($this->inputquantity > 0) {
            # code...
            return $this->inputquantity++;
        // }
    }
    public function decrement()
    {
        // if ($this->inputquantity > 0) {
            # code...
            return $this->inputquantity--;
        // }
    }
    public function mount()
    {
        $this->stores = Store::All();
        $this->carts = Cart::where('user_id', auth()->id())->get();
        $this->search = request()->query('search', $this->search);
    }



    public function render()
    {
        $this->cartUser = $this->cartCount();

        // if (strlen($this->search) > 2) {
            $products =  $this->search === null ? Product::latest()->paginate(6) : Product::latest()->where('name', 'like', '%' . $this->search . '%')->paginate(6);
        // }
        return view('livewire.menu.menu-index', [
            'cartUser' => $this->cartUser,
            'products' => $products
        ]);
    }
}
