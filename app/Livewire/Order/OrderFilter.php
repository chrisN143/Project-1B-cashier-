<?php

namespace App\Livewire\Order;

use Livewire\Component;
use App\Models\Store;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
class OrderFilter extends Component
{
    
    public $start_date = '';
    public $end_date = '';
    public $payment = '';
    public $search = '';
    public $searchItems = '';
    public $storeName = 'elektronik';
    public $stores;
    public $transaction;
    
    public function mount()
    {
        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->add(31, 'day')->format('Y-m-d');
        $this->transaction = Transaction::all();
        $this->stores = Store::all();
    }

    public function updated()
    {
        $this->dispatch('order-filter', [
            "start_date" => $this->start_date,
            "payment" => $this->payment,
            "end_date" => $this->end_date,
            "stores" => $this->storeName,

        ]);
    }
    public function render()
    {
        return view('livewire.order.order-filter');
    }
}
