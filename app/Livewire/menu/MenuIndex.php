<?php

namespace App\Livewire\Menu;

use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;
use App\Models\Store;
use App\Models\Cart;


class MenuIndex extends Component
{
    use WithPagination;
    #[Url()]
    protected $queryString = ['search' => ['except' => '']];
    public $search = '';
    public $stores;
    public $store_id = '1';
    public $carts;
    private $inputquantity = 1;

    public function filter()
    {
        $this->resetPage();
    }

    public function add($id)
    {
        $cart = Cart::where('product_id', $id)->first();
        if (!Product::where('id', $id)->exists()) {
            return;
        }
        if (Cart::where('user_id', auth()->user()->id)->where('product_id', $id)->exists()) {
            $cart->update(['quantity' => $cart->quantity + 1]);
            session()->flash('status', 'Product already updated');
        } else {
            $product = Product::find($id);
            Cart::create([
                'user_id' => auth()->user()->id,
                'quantity' => $this->inputquantity,
                'product_id' => $id,
                'store_id' => $product->store_id
            ]);
            session()->flash('status', 'Product added to cart!');
        }
        $this->dispatch('add');
    }

    public function mount()
    {
        $this->stores = Store::All();
        $this->carts = Cart::where('user_id', auth()->id())->get();
        $this->search = request()->query('search', $this->search);
    }

    public function updatedStoreId()
    {
        $this->dispatch('store-selected', [
            'store_id' => $this->store_id
        ]);
    }

    public function render()
    {
        $products =  Product::where('store_id', 'like', '%' . $this->store_id . '%')->when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->paginate(20);

        return view('livewire.menu.menu-index', [
            'products' => $products
        ]);
    }
}
