<?php

namespace App\Livewire\Order;

use Livewire\Component;

class PrintOrder extends Component
{
    public $order;
    public function render()
    {
        return view('livewire.order.print-order');
    }
}
