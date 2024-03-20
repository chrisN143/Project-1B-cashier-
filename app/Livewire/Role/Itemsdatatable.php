<?php

namespace App\Livewire\Role;

use App\Models\User;
use App\Traits\WithDatatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role as Roles;

class ItemsDatatable extends Component
{
    use WithDatatable;

    public function destroy($id)
    {
        $item = Roles::find($id);
        $authUser = User::find(Auth::id());
        $item->delete();
    }

    public function getColumns(): array
    {
        return [
            [
                'key' => 'id',
                'name' => 'id',
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
                    $detailsUrl = route('role.edit', $item->id);
                    $detailsHtml = "<a href='$detailsUrl' class='btn btn-primary btn-sm ml-2'><i class='fa-solid fa-pen-to-square'></i></a>";

                    $destroyHtml = '';
                    $destroyHtml = "<button type='submit' wire:click.prevent=\"destroy('$item->id')\" class='btn btn-danger btn-sm ml-2'
                                wire:confirm=\"Delete Data?\">
                                <i class='fa fa-trash mr-2'></i>
                                    </button>";

                    $html = "$detailsHtml  $destroyHtml";

                    return $html;
                },
            ],
        ];
    }

    public function getQuery(): Builder
    {
        return Roles::query();
    }

    public function getView(): string
    {
        return 'livewire.role.itemsdatatable';
    }
}