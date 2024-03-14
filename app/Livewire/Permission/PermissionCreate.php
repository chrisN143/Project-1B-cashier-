<?php

namespace App\Livewire\Permission;
use Livewire\Attributes\Rule;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission as Permissions;


class PermissionCreate extends Component
{
    #[Rule('required')]
    public $name;

    public function create()
    {

        $permission = Permissions::create([
            'name' => $this->name
        ]);
        if (!$permission) {
            Alert::toast('Terdapat kesalahan data', 'error');
            return back()->withInput();
        }

        /* Alert & Redirect */
        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect()->route('permission.index');
    }
    public function render()
    {
        return view('livewire.permission.permission-create');
    }
}
