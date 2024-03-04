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

    // public $date = '';
    public $start_date = '';
    public $end_date = '';
    public $payment = '';
    public $search = '';
    public $orders;
    public $transaction;
    public $ordersCount;
    public $totalprice;


    public function filter()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->transaction = Transaction::all();

        $this->ordersCount = Order::all()->count();
        $this->totalprice = 0;
        $this->orders = Order::all();
        foreach ($this->orders as $Item) {
            $this->totalprice += $Item->total_price;
        }
        return $this->totalprice;
    }
    public function render()
    {
        $order = Order::whereDate('created_at', '>=', $this->start_date)->whereDate('created_at', '<=', $this->end_date)->where('customer_name', 'like', '%' . $this->search . '%')->where('payment_method', 'like', '%' . $this->payment . '%')->orderBy('id', 'DESC')->paginate(10);
        // $order = Order::where('created_at', 'like', '%' . $this->date . '%')->where('customer_name', 'like', '%' . $this->search . '%')->where('payment_method', 'like', '%' . $this->payment . '%')->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.laporan.index', [
            'order' => $order,
        ]);
    }
}
