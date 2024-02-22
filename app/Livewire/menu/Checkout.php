<?php

namespace App\Livewire\Menu;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;

class Checkout extends Component
{
    public $carts, $totalprice = 0;
    #[Rule('required')]
    public $customerName;
    public $email;
    // public $phonenumber;
    public $payment_mode = '';
    public $payment_id = '';

    public function Order()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'customer_name' => $this->customerName,
            'status_message' => 'in progress',
            'payment_method' => $this->payment_mode,
            'payment_id' => 1
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
        return $order;
    }
    public function codOrder()
    {
        $this->payment_mode = 'COD';
        $codOrder = $this->Order();
        if ($codOrder) {
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

        return view('livewire.menu.checkout');
    }
}
