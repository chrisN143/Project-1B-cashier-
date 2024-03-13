<?php

namespace App\Livewire\Laporan;

// use App\Models\Payment;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Traits\WithDatatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class ItemsDatatable extends Component
{
    use WithDatatable;
    public $start_date;
    public $end_date;

    #[On('date')]
    public function handleDate($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function destroy($id)
    {
        $item = Order::find($id);

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
                'name' => 'Stok',

            ],
            [
                'key' => 'created_at',
                'name' => 'Stok',

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

        return Order::whereDate('orders.created_at', '<=', '2024-03-07 06:26:01');
        // ->whereDate('orders.created_at', '>=', $this->end_date);
    }

    public function getView(): string
    {
        return 'livewire.laporan.laporanDatatable';
    }
}
