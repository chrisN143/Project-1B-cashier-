<?php

namespace App\Livewire\Laporan;

use Livewire\Attributes\On;
use Livewire\Component;

class StokFilter extends Component
{
    public $stokCount;
    public $itemCounts;

    #[On('items')]
    public function handleOrder($data)
    {
        $this->stokCount = $data;
    }

    public function render()
    {
        return dd($this->stokCount);
        // $this->itemCounts = $this->stokCount->groupBy('product_name')->map(function ($items) {
        //     return [
        //         'product_name' => $items->first()->product_name,
        //         'total_quantity' => $items->sum('product_quantity')
        //     ];
        // });
        return view('livewire.laporan.stok-filter');
    }
}
