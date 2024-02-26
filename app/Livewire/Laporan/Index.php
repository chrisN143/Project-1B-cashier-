<?php

namespace App\Livewire\Laporan;

use App\Models\Order;
use Livewire\Component;

class Index extends Component
{
    public $order;
    public function render()
    {
        $this->order = Order::latest();
        return view('livewire.laporan.index');
    }
}
