<?php

namespace App\Livewire\Menu;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\Store;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use RealRashid\SweetAlert\Facades\Alert;

class Checkout extends Component
{
    public $store_id = '1';
    public $payment;
    public $totalStok;
    #[Rule('required')]
    public $customerName;
    #[Rule('required')]
    public $payment_id;
 
    #[On('store-selected')]
    public function handledStore($data)
    {
        $this->store_id = $data['store_id'];
    }

    public function decrementQuantity($id)
    {
        $cartData = Cart::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if ($cartData && $cartData->quantity > 0) {
            $cartData->decrement('quantity');
            session()->flash('status', 'Quantity Updated!');
        } else {
            session()->flash('error', 'Something wrong! Product quantity can\'t goes below 1');
        }
    }

    public function destroy($id)
    {
        $cartData = Cart::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            $cartData->delete();
            session()->flash('status', 'Cart Item Removed Succesfully!');
        } else {
            session()->flash('error', 'Something wrong!');
        } 
    }
    public function incrementQuantity($id)
    {
        $cartData = Cart::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            $cartData->increment('quantity');
            session()->flash('status', 'Quantity Updated!');
        } else {
            session()->flash('error', 'Something wrong!');
        }
    }

    public function order()
    {
        $cartStore = Store::find($this->store_id);
        $carts = Cart::where('user_id', Auth::id())->where('store_id', $this->store_id)->get();
        $totalPrice = 0;
        foreach ($carts as $item) {
            $countstok = Product::where('id', $item->product_id)->first();
            if ($countstok->stok - $item->quantity < 0) {
                return session()->flash('error', 'Product ' . $countstok->name . ' hanya mempunyai ' . $countstok->stok .  ' stok ');
            }
            $totalPrice += $item->product->price * $item->quantity;
        }

        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'customer_name' => $this->customerName,
            'total_price' => $totalPrice,
            'payment_method' => $this->payment_id,
            'store_name' => $cartStore->store_name,
        ]);
        foreach ($carts as $Item) {
            $countstok = Product::where('id', $Item->product_id)->first();

            $orderitems = OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $Item->product_id,
                'product_price' => $Item->product->price,
                'product_name' => $Item->product->name,
                'product_image' => $Item->product->image,
                'product_quantity' => $Item->quantity,
                'product_store' => $cartStore->store_name
            ]);

            $countstok->update([
                'stok' => $countstok->stok - $Item->quantity
            ]);
        }

        session()->flash('status', 'Orders Has Make!');
        if ($order) {
            Cart::where('user_id', Auth::id())->where('store_id', $this->store_id)->delete();
            session()->flash('status', 'Orders Placed Succesfully');
            Alert::toast('Pesanan Berhasil Dibuat', 'success');
        } else {
            session()->flash('error', 'Something Was Wrong');
            Alert::toast('Pesanan Gagal Dibuat', 'error');
        }
    }

    public function mount()
    {
        $this->customerName = auth()->user()->name;
        $this->payment = Transaction::all();
    }

    public function render()
    {
        $cartStore = Store::find($this->store_id);
        $carts = Cart::where('user_id', Auth::id())->where('store_id', $this->store_id)->get();
        $totalprice = 0;
        foreach ($carts as $Item) {
            $totalprice += $Item->product->price * $Item->quantity;
        }
        return view('livewire.menu.checkout', [
            'cartStore' => $cartStore,
            'carts' => $carts,
            'totalprice' => $totalprice,
        ]);
    }
}
