<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class RoleCreate extends Component
{
    public $permissions;
    public function store() {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        /* Store */
        DB::transaction(function () use ($request) {
            $input = $request->all();

            $role = Role::create($input);
            $role->syncPermissions($request->permission);
        });

        /* Alert & Redirect */
        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect()->route('role.index');
    }
public function mount()
{
    $this->permissions = Permission::all();
}

    public function render()
    {
        return view('livewire.role.role-create');
    }
}
