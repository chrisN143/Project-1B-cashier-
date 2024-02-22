<?php

namespace App\Livewire\Menu;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $carts, $totalprice = 0;
    public $customername;
    public $email;
    public $phonenumber;
    public $pincode;
    public $address;
    public $payment_mode = '';
    public $payment_id = '';

    public function Order()
    {
        $this->validate();
        $order = orders::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'Order-' . Str::random(10),
            'costumername' => $this->customername,
            'phonenumber' => str_replace("-", "", $this->phonenumber),
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id'
        ]);
        foreach ($this->carts as $Item) {
            $orderitems = orderItems::create([
                'order_id' => $order->id,
                'product_id' => $Item->product_id,
                'price' => $Item->product->price
            ]);
        }
        return $order;
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
        return view('livewire.menu.checkout');
    }
}
