<?php

namespace App\Livewire\Order;

use App\Models\Order;

use Hashids\Hashids;
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
        $hash = new Hashids();

        return view('livewire.order.table-order', [
            'hash' => $hash
        ]);
    }
}
