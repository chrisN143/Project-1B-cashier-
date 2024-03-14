<?php

namespace App\Livewire\Permission;

// use App\Models\Payment;
use App\Models\Product;
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

                    // $detailsHtml = '';
                    // $detailsUrl = route('product.detail', $item->product_id);
                    // $detailsHtml = "<a href='$detailsUrl' class='btn btn-primary btn-sm ml-2'><i class='fa fa-detail mr-2'></i>details</a>";
                    $editHtml = '';
                    $editUrl = route('permission.edit',  $item->id);
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
        return Permissions::query();
    }

    public function getView(): string
    {
        return 'livewire.permission.itemsdatatable';
    }
}