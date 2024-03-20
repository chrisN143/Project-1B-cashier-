<?php

namespace App\Livewire\Laporan;

use Livewire\WithPagination;

use App\Models\OrderItems;
use App\Models\Store;
use Illuminate\Support\Carbon;
use Livewire\Component;

class StokReport extends Component
{
    use WithPagination;

    public $start_date = '';
    public $end_date = '';
    public $payment = '';
    public $search = '';
    public $searchItems = '';
    public $storeName = 'elektronik';
    public $stores;
    public function mount()
    {
        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->add(31, 'day')->format('Y-m-d');
        $this->stores = Store::all();
    }
    public function updated()
    {
        $this->dispatch('items-filter', [
            "payment" =>  $this->payment,
            "start_date" =>  $this->start_date,
            "end_date" => $this->end_date,
            "stores" => $this->storeName,

        ]);
    }
    public function render()
    {
  
        $orderItems =  OrderItems::whereDate('created_at', '>=', $this->start_date)->whereDate('created_at', '<=', $this->end_date)->where('product_name', 'like', '%' . $this->search . '%')->paginate(10);
        $itemCounts = $orderItems->groupBy('product_name')->map(function ($items) {
            return [
                'product_name' => $items->first()->product_name,
                'total_quantity' => $items->sum('product_quantity')
            ];
        }); 
        return view('livewire.laporan.stok-report', [
            'itemCounts' => $itemCounts,
            'orderItems' => $orderItems,
        ]);
    }
}
