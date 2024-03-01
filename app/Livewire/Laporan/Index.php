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
        // Order where created at between start date and end date then paginate 10 of them
        $order = Order::where('created_at', 'between', $this->start_date, 'and', $this->end_date)->paginate(10);
        return dd($order);
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
