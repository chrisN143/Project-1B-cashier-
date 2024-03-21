<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class PermissionEdit extends Component
{
    public $permission;

    public $name;
    public function mount()
    {
        $this->name = $this->permission->name;
    }
    public function update()
    {
        /* Update */
      
        if (!$this->permission) {
            Alert::toast('Terdapat kesalahan data', 'error');
            return back()->withInput();
        }

        $this->permission->update([
            'name' => $this->name
        ]);

        /* Alert & Redirect */
        Alert::toast('Data Berhasil Diperbarui', 'success');
        return redirect()->route('permission.index');
    }
    public function render()
    {
        return view('livewire.permission.permission-edit');
    }
}
