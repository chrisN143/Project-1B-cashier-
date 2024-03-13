<?php

namespace App\Livewire\Laporan;

use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Component;

class IndexIncome extends Component
{
    public $order;
    public $ordersCount = 0;
    public $ordersPrice = 0;
    public $total_price = 0;

    public function mount()
    {
        $this->ordersCount = Order::count();
        $this->ordersPrice = Order::get('total_price')->sum('total_price');
    }

    #[On('order')]
    public function handleOrder($data)
    {
        $this->order = $data['data'];
    }

    public function render()
    {
        $this->ordersCount = is_null($this->order) ? 0 : count($this->order);
        $this->ordersPrice = is_null($this->order) ? 0 : collect($this->order)->sum('total_price');

        return view('livewire.laporan.index-income');
    }
}
