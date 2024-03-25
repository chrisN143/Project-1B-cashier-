<?php

namespace App\Livewire\Store;

use App\Models\Store;
use App\Models\User;
use App\Traits\WithDatatable; //namespace untuk with datatable backend
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ItemsDatatable extends Component
{
    use WithDatatable; //untuk memanggil fungsi yang di folder Traits

    public function destroy($id)
    {
        $item = Store::find($id); // untuk memanggil table database
        $authUser = User::find(Auth::id());
        $item->delete();
    }

    public function getColumns(): array
    {
        return [
            [
                'key' => 'store_name', //key sesuai colounm database (untuk memanggil isi database)
                'name' => 'name', //nama coloumn untuk tampilan
            ],
            [
                'key' => 'created_at',
                'name' => 'created_at',
            ],

            [
                'name' => 'Aksi',
                'sortable' => false,
                'searchable' => false,
                'render' => function ($item) {
                    $authUser = User::find(Auth::id());

                    $detailsHtml = '';
                    $detailsUrl = route('store.detail', ['id' => $item['id']]);
                    $detailsHtml = "<a href='$detailsUrl' class='btn btn-primary btn-sm ml-2'><i class='fa-solid fa-circle-info'></i></a>"; // untuk tampilan tombol detail tetapi sesuai kan kebutuhan
                    $editHtml = '';
                    $editUrl = route('store.detail', ['id' => $item['id']]);
                    $editHtml = "<a href='$editUrl' class='btn btn-primary btn-sm ml-2'><i class='fa-solid fa-pen-to-square'></i></a>";


                    $destroyHtml = '';
                    $destroyHtml = "<button type='submit' wire:click.prevent=\"destroy('$item->id')\" class='btn btn-danger btn-sm ml-2'
                                wire:confirm=\"Delete Data?\">
                                <i class='fa fa-trash mr-2'></i>
                                    </button>";

                    if (auth()->user()->hasAnyPermission('store-edit|update')) {
                        $html = "$editHtml";
                        return $html;
                    } elseif (auth()->user()->hasAnyPermission('store-delete')) {
                        $html = "$detailsHtml $destroyHtml";
                        return $html;
                    } elseif (auth()->user()->hasAnyPermission(['store-delete', 'store-edit|update'])) {
                        # code...
                        $html = "$editHtml $destroyHtml";
                        return $html;
                    } else {
                        $html = "$detailsHtml";
                        return $html;
                    }
                },
            ],
        ];
    }

    public function getQuery(): Builder
    {
        return Store::query();
    }

    public function getView(): string
    {
        return 'livewire.store.itemsdatatable';
    }
}
