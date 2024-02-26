<?php

namespace App\Livewire\Order;
use App\Models\Order;


use Livewire\Component;

class TableOrder extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Order::All();
    }

    public function show()
    {
        
    }


    public function render()
    {
        return view('livewire.order.table-order');
    }
}
