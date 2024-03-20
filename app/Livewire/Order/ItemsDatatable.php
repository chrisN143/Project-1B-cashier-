<?php

namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\User;
use App\Traits\WithDatatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ItemsDatatable extends Component
{
    use WithDatatable;
    public $start_date;
    public $payment;
    public $end_date;
    public $stores;
    public function onMount()
    {
        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->add(31, 'day')->format('Y-m-d');
        $this->stores = 'elektronik';
    }

    #[On('order-filter')]
    public function handleDate($arr)
    {
        $this->start_date = $arr['start_date'];
        $this->end_date = $arr['end_date'];
        $this->payment = $arr['payment'];
        $this->stores = $arr['stores'];
    }

    public function destroy($id)
    {
        $item = Order::find($id);
        $authUser = User::find(Auth::id());
        $item->delete();
    }

    public function getColumns(): array
    {
        return [
            [
                'key' => 'order_code',
                'name' => 'id',
            ],
            [
                'key' => 'total_price',
                'name' => 'Total',
                'render' => function ($item) {
                    return 'Rp.' . number_format($item->total_price, 0, ',', '.');
                }
            ],
            [
                'key' => 'payment_method',
                'name' => 'Payment',
            ],
            [
                'key' => 'store_name',
                'name' => 'Store',

            ],
            [
                'key' => 'created_at',
                'name' => 'Created_at',
            ],
            [
                'name' => 'Aksi',
                'sortable' => false,
                'searchable' => false,
                'render' => function ($item) {
                    $authUser = User::find(Auth::id());
                    $detailsHtml = '';
                    $detailsUrl = route('orders.detail', $item->order_code);
                    $detailsHtml = "<a href='$detailsUrl' class='btn btn-primary btn-sm ml-2'><i class='fa-solid fa-pen-to-square'></i></a>";
                    $printHtml = '';
                    $printUrl = route('orders.print', $item->order_code);
                    $printHtml = "<a href='$printUrl' class='btn btn-success btn-sm ml-2'><i class='fa-solid fa-print'></i></a>";
                    $destroyHtml = '';
                    $destroyHtml = "<button type='submit' wire:click.prevent=\"destroy('$item->id')\" class='btn btn-danger btn-sm ml-2'
                                wire:confirm=\"Delete Data?\">
                                <i class='fa fa-trash mr-2'></i>
                                    </button>";

                    $html = "$detailsHtml $printHtml  $destroyHtml";

                    return $html;
                },
            ],
        ];
    }

    public function getQuery(): Builder
    {
        return Order::whereDate('created_at', '>=', $this->start_date)
            ->whereDate('created_at', '<=', $this->end_date)
            ->where('store_name',  'like', '%' . $this->stores . '%')
            ->where('payment_method', 'like', '%' . $this->payment . '%');
    }

    public function getView(): string
    {
        return 'livewire.order.itemsdatatable';
    }
}
