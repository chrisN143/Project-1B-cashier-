<?php

namespace App\Livewire\Laporan;

use App\Models\Order;
use Livewire\Component;
use Hashids\Hashids;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $orders;
    public $totalprice;
    public function mount()
    {
        $this->totalprice = 0;
        $this->orders = Order::all();
        foreach ($this->orders as $Item) {
            $this->totalprice += $Item->total_price;
        }
        return $this->totalprice;
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
