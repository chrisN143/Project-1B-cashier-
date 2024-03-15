<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Rule;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
    
class RoleCreate extends Component
{

    public $permissions;
    #[Rule('required')]
    public $name;
    public function store() {
    $this->validate();      
            $role = Role::create([
                'name' => $this->name
            ]);
            $role->syncPermissions($this->permissions);


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
