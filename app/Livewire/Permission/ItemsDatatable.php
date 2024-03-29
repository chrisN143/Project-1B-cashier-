<?php

namespace App\Livewire\Permission;

use App\Models\User;
use App\Traits\WithDatatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Permission as Permissions;


class ItemsDatatable extends Component
{
    use WithDatatable;

    public function destroy($id)
    {
        $item = Permissions::find($id);

        $authUser = User::find(Auth::id());
        $item->delete($id);
    }

    public function getColumns(): array
    {
        return [

            [
                'key' => 'id',
                'name' => 'Id',

            ],
            [
                'key' => 'name',
                'name' => 'Name',

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
                    $detailsUrl = route('permission.edit', $item->id);
                    $detailsHtml = "<a href='$detailsUrl' class='btn btn-primary btn-sm ml-2'><i class='fa-solid fa-circle-info'></i></a>";
                    $editHtml = '';
                    $editUrl = route('permission.edit',  $item->id);
                    $editHtml = "<a href='$editUrl' class='btn btn-primary btn-sm ml-2'><i class='fa-solid fa-pen-to-square'></i></a>";


                    $destroyHtml = '';
                    $destroyHtml = "<button type='submit' wire:click.prevent=\"destroy('$item->id')\" class='btn btn-danger btn-sm ml-2'
                                wire:confirm=\"Delete Data?\">
                                <i class='fa fa-trash mr-2'></i>
                                    </button>";


                    if (auth()->user()->hasAnyPermission(['permission-delete', 'permission-edit|update'])) {
                        # code...
                        $html = "$editHtml $destroyHtml";
                        return $html;
                    } elseif (auth()->user()->hasAnyPermission('permission-delete')) {
                        $html = "$detailsHtml $destroyHtml";
                        return $html;
                    } elseif (auth()->user()->hasAnyPermission('permission-edit|update')) {
                        # code...
                        $html = "$editHtml";
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
        return Permissions::query();
    }

    public function getView(): string
    {
        return 'livewire.permission.itemsdatatable';
    }
}
