<?php

namespace App\Livewire\Laporan;

// use App\Models\Payment;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Traits\WithDatatable;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class stokReportDatatable extends Component
{
    use WithDatatable;
    public $start_date;

    public $end_date;
    public function onMount()
    {
        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->add(31, 'day')->format('Y-m-d');
    }

    #[On('items-filter')]
    public function handleDate($filter)
    {
        $this->start_date = $filter['start_date'];

        $this->end_date = $filter['end_date'];
    }

    public function destroy($id)
    {
        $item = OrderItems::find($id);

        $item->delete();
    }

    public function getColumns(): array
    {
        return [
            [
                'key' => 'order_items.product_price',
                'name' => 'Id',
                'render' => function ($item) {
                    return $item->order_code;
                }

            ],
            [
                'key' => 'order_items.product_name',
                'name' => 'Name',
                'render' => function ($item) {
                    return $item->product_name;
                }

            ],
            [
                'key' => 'order_items.product_price',
                'name' => 'Price',
                'render' => function ($item) {
                    return 'Rp.' . number_format($item->product_price, 0, ',', '.');
                }
            ],

            [
                'key' => 'order_items.product_quantity',
                'name' => 'Quantity',
                'render' => function ($item) {
                    return $item->product_quantity;
                }

            ],
            [
                'key' => 'order_items.product_price',
                'name' => 'Price',
                'render' => function ($item) {
                    return 'Rp.' . number_format($item->product_price * $item->product_quantity, 0, ',', '.');
                }
            ],
            [
                'key' => 'order_items.created_at',
                'name' => 'Created_at',
                'render' => function ($item) {
                    return $item->created_at;
                }

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
        return OrderItems::select(
            'order_items.product_price as product_price',
            'order_items.product_name as product_name',
            'order_items.product_quantity as product_quantity',
            'order_items.created_at as created_at',
            'orders.order_code as order_code',
        )
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->whereDate('order_items.created_at', '>=', $this->start_date)
            ->whereDate('order_items.created_at', '<=', $this->end_date);
        // ->whereDate('orders.created_at', '>=', $this->end_date);
    }

    public function getView(): string
    {
        return 'livewire.laporan.stokReportDatatable';
    }
}
