<?php

namespace App\Livewire\Laporan;

use Livewire\WithPagination;

use App\Models\OrderItems;
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

    public function filter()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->add(31, 'day')->format('Y-m-d');
    }
    public function render()
    {
        // $orderItems =  OrderItems::when($this->searchItems, function ($query) {
        //     $query->where('product_name', 'like', '%' . $this->searchItems . '%');
        // })->get();
        $orderItems =  OrderItems::whereDate('created_at', '>=', $this->start_date)->whereDate('created_at', '<=', $this->end_date)->where('product_name', 'like', '%' . $this->search . '%')->get();
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
