<?php

namespace App\Livewire\Role;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    #[Rule('required')]
    public $name;
    public $role;
    public $permissions;
    public $role_permissions;
    public function mount() {
        $this->permissions = Permission::all();
        $this->role_permissions = DB::table("role_has_permissions")
        ->where("role_id", $this->role->id)
        ->pluck('permission_id', 'permission_id')
        ->all();
    }
    public function update() {
         /* Validation */
$this->validate();

        /* Update */

            $this->role->update([
                'name'=> $this->name
            ]);
            $this->role->syncPermissions($this->permissions);


        // /* Alert & Redirect */
        // Alert::toast('Data Berhasil Diperbarui', 'success');
        return redirect('/role');
    }
    public function render()
    {
        return view('livewire.role.edit');
    }
}
