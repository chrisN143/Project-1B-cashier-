<?php

namespace App\Livewire\Role;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    #[Rule('required')]
    public $name;
    public $roles;
    public $id;
    public $permissions;
    public $role_permissions;
    public $oldPermissions;
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
        $roles = Role::where('id', $this->id)->first();
        $this->name = $roles->name;
        $this->permissions = Permission::all()->toArray();
        $role_permissions = DB::table("role_has_permissions")
            ->where("role_id", $roles->id)
            ->pluck('permission_id')
            ->all();
        $this->oldPermissions = Permission::find($role_permissions)->toArray();

        foreach ($this->oldPermissions as $index => $item) {
            // Value : ['is_checked'=>false]
            $this->oldPermissions[$index]['is_checked'] = true;
            // dd($this->oldPermissions);

            foreach ($this->permissions as $index => $item) {
                // Value : ['is_checked'=>false]
                $this->permissions[$index]['is_checked'] = false;
            }
        }
    }


    // public function mount()
    // {

    //     $roles = Role::where('id', $this->id)->first();
    //     $this->permissions = Permission::all()->toArray();
    //     $this->name = $roles->name;
    //     $role_permissions = DB::table("role_has_permissions")
    //         ->where("role_id", $roles->id)
    //         ->pluck('permission_id')
    //         ->all();
    //     // foreach ($this->permissions as $index => $item) {

    //     $this->oldPermissions = Permission::find($role_permissions)->toArray();



    //     //     // Value : ['is_checked'=>false]
    //     //     $this->permissions[$index]['is_checked'] = false;
    //     // }

    //     // $this->role_permissions = [];

    //     // foreach ($role_permissions as $index => $item) {
    //     //     // if ($role_permissions[$index]['is_checked'] === true) {
    //     //         $role_permissions = $role_permissions[$index]['name'];
    //     //     // }
    //     //     return $role_permissions;
    //     // }
    // }

    public function update()
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
        $role = Role::find($this->id);
        $role->update([
            'name' => $this->name
        ]);
        $role->syncPermissions($roles);
        /* Alert & Redirect */
        Alert::toast('Data Berhasil Disimpan', 'success');

        return redirect()->route('role.index');
    }
    public function render()
    {

        // return dd($this);
        return view('livewire.role.edit');
    }
}
