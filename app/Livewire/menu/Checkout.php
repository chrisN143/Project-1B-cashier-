<?php

namespace App\Livewire\Menu;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;

class Checkout extends Component
{

    public $carts, $totalprice = 0;
    public $payment;
    public $totalStok;
    #[Rule('required')]
    public $customerName;
    #[Rule('required')]
    public $payment_id;
    public $email;
    public $cartUser;

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

    public function Order()
    {
        $this->validate();
        foreach ($this->carts as $Item) {
            $countstok = Product::where('id', $Item->product_id)->first();
            if ($countstok->stok - $Item->quantity < 0) {
                return session()->flash('error', 'Product ' . $countstok->name . ' hanya mempunyai ' . $countstok->stok .  ' stok ');
            }
        }

        $order = Order::create([
            'order_code' => 'Order-' . Str::random(10),
            'user_id' => auth()->user()->id,
            'customer_name' => $this->customerName,
            'total_price' => $this->totalprice,
            'payment_method' => $this->payment_id,
        ]);
        foreach ($this->carts as $Item) {
            $countstok = Product::where('id', $Item->product_id)->first();

            $orderitems = OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $Item->product_id,
                'product_price' => $Item->product->price,
                'product_name' => $Item->product->name,
                'product_image' => $Item->product->image,
                'product_quantity' => $Item->quantity
            ]);

            $countstok->update([
                'stok' => $countstok->stok - $Item->quantity
            ]);
        }

        session()->flash('status', 'Orders Has Make!');

        if ($order) {
            Cart::where('user_id', Auth::id())->delete();
            session()->flash('status', 'Orders Placed Succesfully');
            return redirect()->route('menu.index');
        } else {
            session()->flash('error', 'Something Was Wrong');

            return redirect()->route('menu.checkout');
        }
    }
    #[On('add')]

    public function mount()
    {
        $this->customerName = auth()->user()->name;
        $this->payment = Transaction::all();
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
