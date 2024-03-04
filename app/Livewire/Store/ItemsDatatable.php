<?php

namespace App\Livewire\Store;

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
        $item = Store::find($id);
        $authUser = User::find(Auth::id());
        $item->delete();
    }

    public function getColumns(): array
    {
        return [
            [
                'key' => 'store_name',
                'name' => 'name',
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
                    $detailsUrl = route('store.detail', $item->id);
                    $detailsHtml = "<a href='$detailsUrl' class='btn btn-primary btn-sm ml-2'><i class='fa fa-detail mr-2'></i>details</a>";
                    $editHtml = '';
                    $editUrl = route('store.detail', ['id' => $item['id']]);
                    $editHtml = "<a href='$editUrl' class='btn btn-primary btn-sm ml-2'><i class='fa-solid fa-pen-to-square'></i></a>";


                    $destroyHtml = '';
                    $destroyHtml = "<button type='submit' wire:click.prevent=\"destroy('$item->id')\" class='btn btn-danger btn-sm ml-2'
                                wire:confirm=\"Delete Data?\">
                                <i class='fa fa-trash mr-2'></i>
                                    </button>";

                    $html = "$editHtml  $destroyHtml";

                    return $html;
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
