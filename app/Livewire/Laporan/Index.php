<?php

namespace App\Livewire\Laporan;

use Livewire\WithPagination;

use App\Models\Order;
use App\Models\Transaction;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;

class Index extends Component
{
    use WithPagination;

    public $date = '';
    public $payment = '';
    public $orders;
    public $ordersCount;
    public $totalprice;

    public $results;
    public function filter()
    {
        $this->resetPage();
    }
    // public function filter()
    // {
    //     // Order where created at between start date and end date then paginate 10 of them
    //     $order = Order::where('created_at', 'between', $this->start_date, 'and', $this->end_date)->paginate(10);
    //     return dd($order);
    // }
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
        $payment = Transaction::all();
        $this->ordersCount = Order::all()->count();
        $order = Order::where('created_at', 'like', '%' . $this->date . '%')->where('payment_method', 'like', '%' . $this->payment . '%')->orderBy('id', 'DESC')->paginate(3);

        // $order = Order::latest()->paginate(10);
        return view('livewire.laporan.index', [
            'order' => $order,
            'transaction' => $payment
            // 'hash' => $hash

        ]);
    }
}
