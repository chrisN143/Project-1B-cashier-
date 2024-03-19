<?php

namespace App\Livewire\Laporan;

use Livewire\WithPagination;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;

class Index extends Component
{
    use WithPagination;

    public $start_date = '';
    public $end_date = '';
    public $payment = '';
    public $search = '';
    public $searchItems = '';
    public $orders;
    public $order;
    public $allOrders;
    public $transaction;
    public $orderItems;
    public $totalprice;


    public function filter()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->add(31, 'day')->format('Y-m-d');
        $this->transaction = Transaction::all();
    }

    public function updated()
    {
        $this->dispatch('add-filter', [
            "start_date" => $this->start_date,
            "payment" => $this->payment,
            "end_date" => $this->end_date,
        ]);
    }

    public function render()
    {
        $order = $this->allOrders === 'trashed' ? Order::withTrashed()->whereDate('created_at', '>=', $this->start_date)->whereDate('created_at', '<=', $this->end_date)->where('customer_name', 'like', '%' . $this->search . '%')->where('payment_method', 'like', '%' . $this->payment . '%')->paginate(10) : Order::whereDate('created_at', '>=', $this->start_date)->whereDate('created_at', '<=', $this->end_date)->where('customer_name', 'like', '%' . $this->search . '%')->where('payment_method', 'like', '%' . $this->payment . '%')->orderBy('id', 'DESC')->paginate(10);
        $this->dispatch('order', data: $order);
        return view('livewire.laporan.index');
    }
}
