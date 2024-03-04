<?php

namespace App\Livewire\Laporan;

// use App\Models\Payment;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Traits\WithDatatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ItemsDatatable extends Component
{
    use WithDatatable;

    public function destroy($id)
    {
        $item = Order::find($id);
        // $authUser = User::find(Auth::id());
        $item->delete();
    }

    public function getColumns(): array
    {
        return [
            [
                'key' => 'order_code',
                'name' => 'Id',
            ],
            [
                'key' => 'customer_name',
                'name' => 'Name',
            ],
            [
                'key' => 'total_price',
                'name' => 'Price',
            ],
            [
                'name' => 'Aksi',
                'sortable' => false,
                'searchable' => false,
                'render' => function ($item) {
                    $authUser = User::find(Auth::id());

                    $detailsHtml = '';
                    $detailsUrl = route('laporan.detail', $item->order_code);
                    $detailsHtml = "<a href='$detailsUrl' class='btn btn-primary btn-sm ml-2'><i class='fa-solid fa-eye'></i></a>";
                    $html = "$detailsHtml";

                    return $html;
                },
            ],
        ];
    }

    public function getQuery(): Builder
    {
        return Order::query();
    }

    public function getView(): string
    {
        return 'livewire.laporan.laporanDatatable';
    }
}
