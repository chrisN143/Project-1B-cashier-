<?php

namespace App\Livewire\Laporan;

use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Component;

class IndexIncome extends Component
{
    public $order;
    public $ordersCount;
    public $ordersPrice;

    #[On('order')]
    public function handleOrder($data)
    {
        $this->order = $data['data'];
    }

    public function render()
    {
        $this->ordersCount = collect($this->order)->count();
        $this->ordersPrice = collect($this->order)->sum('total_price');

        return view('livewire.laporan.index-income');
    }
}
