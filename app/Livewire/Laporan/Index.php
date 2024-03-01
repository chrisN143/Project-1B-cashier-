<?php

namespace App\Livewire\Laporan;

use Livewire\WithPagination;

use App\Models\Order;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;
    public $start_date;
    public $end_date;
    public $orders;
    public $ordersCount;
    public $totalprice;


    public function filter()
    {


        $order = Order::whereDate('created_at', '>=', $this->start_date)->whereDate('created_at', '<=', $this->end_date)->paginate(10);
        return $order;
    }
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

        $this->ordersCount = Order::all()->count();

        $order = Order::latest()->paginate(10);
        return view('livewire.laporan.index', [
            'order' => $order,
            // 'hash' => $hash

        ]);
    }
}
