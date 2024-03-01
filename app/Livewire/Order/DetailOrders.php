<?php

namespace App\Livewire\Order;

use Livewire\Component;

class DetailOrders extends Component
{
    public $order;
    public function render()
    {
        return view('livewire.order.detail-orders');
    }
}
