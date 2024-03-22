<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Rule;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class RoleCreate extends Component
{
    #[Rule('required')]
    public $name;

    public $permissions;

    // private $rolePermissions = [];

    public function mount()
    {
        /*
        [
            'id'=>1,
            'name'=>'user.create',
            'is_checked'=>true/false
        ],
        [
            'id'=>1,
            'name'=>'user.read',
            'is_checked'=>true/false
        ]
        */
        // Value: ['abc','def']
        $this->permissions = Permission::all()->toArray();

        foreach ($this->permissions as $index => $item) {
            // Value : ['is_checked'=>false]
            $this->permissions[$index]['is_checked'] = false;
        }
    }



    public function store()
    {
        $this->validate();

        $roles = [];
        // dd($this->permissions);

        foreach ($this->permissions as $index => $item) {
            if ($this->permissions[$index]['is_checked'] === true) {
                $roles[count($roles)] = $this->permissions[$index]['name'];
            }
        }

        // dd($roles);

        $role = Role::create([
            'name' => $this->name
        ]);
        $role->syncPermissions($roles);
        /* Alert & Redirect */
        Alert::toast('Data Berhasil Disimpan', 'success');

        return redirect()->route('role.index');
    }

    public function render()
    {
        return view('livewire.role.role-create');
    }
}
