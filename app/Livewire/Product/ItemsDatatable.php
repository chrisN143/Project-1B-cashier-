<?php

namespace App\Livewire\Product;

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
        $item = Product::find($id);
        $authUser = User::find(Auth::id());
        $item->delete();
    }

    public function getColumns(): array
    {
        return [
            [
                'key' => 'stores.store_name',
                'name' => 'Toko',
                'render' => function ($item) {
                    return $item->store_name;
                }
            ],
            [
                'key' => 'products.code',
                'name' => 'Id',
                'render' => function ($item) {
                    return $item->product_code;
                }
            ],
            [
                'key' => 'products.name',
                'name' => 'Name',
                'render' => function ($item) {
                    return $item->product_name;
                }
            ],
            [
                'key' => 'products.price',
                'name' => 'Price',
                'render' => function ($item) {
                    return 'Rp.' . $item->product_price;
                }
            ],
            [
                'key' => 'products.stok',
                'name' => 'Stok',
                'render' => function ($item) {
                    return  $item->product_stok;
                }
            ],
            [
                'name' => 'Aksi',
                'sortable' => false,
                'searchable' => false,
                'render' => function ($item) {
                    $authUser = User::find(Auth::id());

                    $detailsHtml = '';
                    $detailsUrl = route('product.detail', $item->product_id);
                    $detailsHtml = "<a href='$detailsUrl' class='btn btn-primary btn-sm ml-2'><i class='fa fa-detail mr-2'></i>details</a>";
                    $editHtml = '';
                    $editUrl = route('product.detail', ['product_id' => $item['product_id']]);
                    $editHtml = "<a href='$editUrl' class='btn btn-primary btn-sm ml-2'><i class='fa-solid fa-pen-to-square'></i></a>";


                    $destroyHtml = '';
                    $destroyHtml = "<button type='submit' wire:click.prevent=\"destroy('$item->product_id')\" class='btn btn-danger btn-sm ml-2'
                                wire:confirm=\"Delete Data?\">
                                <i class='fa fa-trash mr-2'></i>
                                    </button>";
                    if (auth()->user()->hasAnyPermission('product-edit|update')) {
                        # code...
                        $html = "$editHtml";
                        return $html;
                    }
                    if (auth()->user()->hasAnyPermission('product-delete')) {
                        # code...
                        $html = "$destroyHtml";
                        return $html;
                    }
                    if (auth()->user()->hasAnyPermission(['product-delete', 'product-edit|update'])) {
                        # code...
                        $html = "$editHtml $destroyHtml";
                        return $html;
                    }
                    // $html = "$editHtml";

                    // return $html;
                },
            ],
        ];
    }

    public function getQuery(): Builder
    {
        return Product::select(
            'products.id as product_id',
            'products.code as product_code',
            'products.name as product_name',
            'products.stok as product_stok',
            'products.price as product_price',
            'stores.store_name as store_name'
        )->join('stores', 'stores.id', '=', 'products.store_id');
    }

    public function getView(): string
    {
        return 'livewire.product.itemsdatatable';
    }
}
