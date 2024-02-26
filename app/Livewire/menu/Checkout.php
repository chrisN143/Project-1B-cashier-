<?php

namespace App\Livewire\Menu;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;

class Checkout extends Component
{
    public $carts, $totalprice = 0;
    public $payment;
    #[Rule('required')]
    public $customerName;
    public $email;
    public $payment_id;

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
        // $this->resetPage();  
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
        // $payment = 
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'customer_name' => $this->customerName,
            'status_message' => 'in progress',
            'total_price' => $this->totalprice,
            'payment_method' => $this->payment_id,
        ]);
        foreach ($this->carts as $Item) {
            $orderitems = OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $Item->product_id,
                'product_price' => $Item->product->price,
                'product_name' => $Item->product->name,
                'product_image' => $Item->product->image
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

    public function mount()
    {
        // $this->payment_mode = Transaction::where('id', $this->payment)->first();

        $this->totalprice = 0;
        $this->carts = Cart::where('user_id', Auth::id())->get();
        foreach ($this->carts as $Item) {
            $this->totalprice += $Item->product->price * $Item->quantity;
        }
        return $this->totalprice;
    }
    public function render()
    {
        $this->customerName = auth()->user()->name;
        $this->payment = Transaction::all();
        return view('livewire.menu.checkout');
    }
}
