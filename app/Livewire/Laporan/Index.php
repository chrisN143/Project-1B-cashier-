<?php

namespace App\Livewire\Laporan;

use App\Models\Order;
use Livewire\Component;
use Hashids\Hashids;

class Index extends Component
{
    // public $order;
    public function mount() {
        
    } 
    public function render()
    {
        $hash = new Hashids();
        $order = Order::all();
        return view('livewire.laporan.index', [
            'order' => $order,
            'hash' => $hash

        ]);
    }
}
