<?php

namespace App\Livewire\Order;

use App\Models\Order;

use Hashids\Hashids;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TableOrder extends Component
{
    // public $orders;

    public function mount()
    {
    }

    public function show()
    {
    }


    public function render()
    {

        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.order.table-order', [

            'orders' => $orders
        ]);
    }
}
