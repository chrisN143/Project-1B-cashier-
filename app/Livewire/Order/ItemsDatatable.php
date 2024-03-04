<?php

namespace App\Livewire\Order;

// use App\Models\Payment;

use App\Models\Order;
use App\Models\Store;
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
            ],
            [
                'key' => 'payment_method',
                'name' => 'Payment',
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
                    // $editHtml = '';
                    // $editUrl = route('order.print', $item->order_code);
                    // $editHtml = "<a href='$editUrl' class='btn btn-primary btn-sm ml-2'><i class='fa-solid fa-pen-to-square'></i></a>";
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
        return Order::query();
    }

    public function getView(): string
    {
        return 'livewire.order.itemsdatatable';
    }
}
