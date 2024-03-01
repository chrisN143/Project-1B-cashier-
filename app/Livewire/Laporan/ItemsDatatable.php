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
                    $detailsHtml = "<a href='$detailsUrl' class='btn btn-primary btn-sm ml-2'><i class='fa fa-detail mr-2'></i>details</a>";
                    // $editHtml = '';
                    // $editUrl = route('product.detail', ['id' => $item['id']]);
                    // $editHtml = "<a href='$editUrl' class='btn btn-primary btn-sm ml-2'><i class='fa-solid fa-pen-to-square'></i></a>";


                    // $destroyHtml = '';
                    // $destroyHtml = "<button type='submit' wire:click.prevent=\"destroy('$item->id')\" class='btn btn-danger btn-sm ml-2'
                    //             wire:confirm=\"Delete Data?\">
                    //             <i class='fa fa-trash mr-2'></i>
                    //                 </button>";

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
