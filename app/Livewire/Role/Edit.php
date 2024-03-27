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
    public $permissions1;
    public $permissions2;
    public $permissions3;
    public $permissions4;
    public $permissions5;
    public $permissions6;
    public $permissions7;
    public $permissions8;
    public $permissions9;
    public $permissions10;
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
        $this->permissions1 = Permission::where('name', 'like', '%' . 'permission' . '%')->get()->toArray();
        $this->permissions2 = Permission::where('name', 'like', '%' . 'user' . '%')->get()->toArray();
        $this->permissions3 = Permission::where('name', 'like', '%' . 'role' . '%')->get()->toArray();
        $this->permissions4 = Permission::where('name', 'like', '%' . 'dashboard' . '%')->get()->toArray();
        $this->permissions5 = Permission::where('name', 'like', '%' . 'product' . '%')->get()->toArray();
        $this->permissions6 = Permission::where('name', 'like', '%' . 'store' . '%')->get()->toArray();
        $this->permissions7 = Permission::where('name', 'like', '%' . 'transaction' . '%')->get()->toArray();
        $this->permissions8 = Permission::where('name', 'like', '%' . 'laporan' . '%')->get()->toArray();
        $this->permissions9 = Permission::where('name', 'like', '%' . 'menu' . '%')->get()->toArray();
        $this->permissions10 = Permission::where('name', 'like', '%' . 'master' . '%')->get()->toArray();
        $role_permissions = DB::table("role_has_permissions")
            ->where("role_id", $roles->id)
            ->pluck('permission_id')
            ->all();
        $this->oldPermissions = Permission::find($role_permissions)->toArray();

        foreach ($this->permissions1 as $index => $item) {
            // Value : ['is_checked'=>false]
            $this->permissions1[$index]['is_checked'] = false;
        }
        foreach ($this->permissions2 as $index => $item) {
            // Value : ['is_checked'=>false]
            $this->permissions2[$index]['is_checked'] = false;
        }
        foreach ($this->permissions3 as $index => $item) {
            // Value : ['is_checked'=>false]
            $this->permissions3[$index]['is_checked'] = false;
        }
        foreach ($this->permissions4 as $index => $item) {
            // Value : ['is_checked'=>false]
            $this->permissions4[$index]['is_checked'] = false;
        }
        foreach ($this->permissions5 as $index => $item) {
            // Value : ['is_checked'=>false]
            $this->permissions5[$index]['is_checked'] = false;
        }
        foreach ($this->permissions6 as $index => $item) {
            // Value : ['is_checked'=>false]
            $this->permissions6[$index]['is_checked'] = false;
        }
        foreach ($this->permissions7 as $index => $item) {
            // Value : ['is_checked'=>false]
            $this->permissions7[$index]['is_checked'] = false;
        }
        foreach ($this->permissions8 as $index => $item) {
            // Value : ['is_checked'=>false]
            $this->permissions8[$index]['is_checked'] = false;
        }
        foreach ($this->permissions9 as $index => $item) {
            // Value : ['is_checked'=>false]
            $this->permissions9[$index]['is_checked'] = false;
        }
        foreach ($this->permissions10 as $index => $item) {
            // Value : ['is_checked'=>false]
            $this->permissions10[$index]['is_checked'] = false;
        }
        foreach ($this->oldPermissions as $role => $item) {
            foreach ($this->permissions1 as $index => $item) {
                if ($this->permissions1[$index]['name'] == $this->oldPermissions[$role]['name']) {
                    $this->permissions1[$index]['is_checked'] = true;
                    # code...
                }
            }
            foreach ($this->permissions2 as $index => $item) {
                if ($this->permissions2[$index]['name'] == $this->oldPermissions[$role]['name']) {
                    $this->permissions2[$index]['is_checked'] = true;
                    # code...
                }
            }
            foreach ($this->permissions3 as $index => $item) {
                if ($this->permissions3[$index]['name'] == $this->oldPermissions[$role]['name']) {
                    $this->permissions3[$index]['is_checked'] = true;
                    # code...
                }
            }
            foreach ($this->permissions4 as $index => $item) {
                if ($this->permissions4[$index]['name'] == $this->oldPermissions[$role]['name']) {
                    $this->permissions4[$index]['is_checked'] = true;
                    # code...
                }
            }
            foreach ($this->permissions5 as $index => $item) {
                if ($this->permissions5[$index]['name'] == $this->oldPermissions[$role]['name']) {
                    $this->permissions5[$index]['is_checked'] = true;
                    # code...
                }
            }
            foreach ($this->permissions6 as $index => $item) {
                if ($this->permissions6[$index]['name'] == $this->oldPermissions[$role]['name']) {
                    $this->permissions6[$index]['is_checked'] = true;
                    # code...
                }
            }
            foreach ($this->permissions6 as $index => $item) {
                if ($this->permissions6[$index]['name'] == $this->oldPermissions[$role]['name']) {
                    $this->permissions6[$index]['is_checked'] = true;
                    # code...
                }
            }
            foreach ($this->permissions7 as $index => $item) {
                if ($this->permissions7[$index]['name'] == $this->oldPermissions[$role]['name']) {
                    $this->permissions7[$index]['is_checked'] = true;
                    # code...
                }
            }
            foreach ($this->permissions8 as $index => $item) {
                if ($this->permissions8[$index]['name'] == $this->oldPermissions[$role]['name']) {
                    $this->permissions8[$index]['is_checked'] = true;
                    # code...
                }
            }
            foreach ($this->permissions9 as $index => $item) {
                if ($this->permissions9[$index]['name'] == $this->oldPermissions[$role]['name']) {
                    $this->permissions9[$index]['is_checked'] = true;
                    # code...
                }
            }
            foreach ($this->permissions10 as $index => $item) {
                if ($this->permissions10[$index]['name'] == $this->oldPermissions[$role]['name']) {
                    $this->permissions10[$index]['is_checked'] = true;
                    # code...
                }
            }
        }
    }





    public function update()
    {
        $this->validate();

        $roles = [];


        foreach ($this->permissions1 as $index => $item) {
            if ($this->permissions1[$index]['is_checked'] === true) {
                $roles[count($roles)] = $this->permissions1[$index]['name'];
            }
        }
        foreach ($this->permissions2 as $index => $item) {
            if ($this->permissions2[$index]['is_checked'] === true) {
                $roles[count($roles)] = $this->permissions2[$index]['name'];
            }
        }
        foreach ($this->permissions3 as $index => $item) {
            if ($this->permissions3[$index]['is_checked'] === true) {
                $roles[count($roles)] = $this->permissions3[$index]['name'];
            }
        }
        foreach ($this->permissions4 as $index => $item) {
            if ($this->permissions4[$index]['is_checked'] === true) {
                $roles[count($roles)] = $this->permissions4[$index]['name'];
            }
        }
        foreach ($this->permissions5 as $index => $item) {
            if ($this->permissions5[$index]['is_checked'] === true) {
                $roles[count($roles)] = $this->permissions5[$index]['name'];
            }
        }
        foreach ($this->permissions6 as $index => $item) {
            if ($this->permissions6[$index]['is_checked'] === true) {
                $roles[count($roles)] = $this->permissions6[$index]['name'];
            }
        }
        foreach ($this->permissions7 as $index => $item) {
            if ($this->permissions7[$index]['is_checked'] === true) {
                $roles[count($roles)] = $this->permissions7[$index]['name'];
            }
        }
        foreach ($this->permissions8 as $index => $item) {
            if ($this->permissions8[$index]['is_checked'] === true) {
                $roles[count($roles)] = $this->permissions8[$index]['name'];
            }
        }
        foreach ($this->permissions9 as $index => $item) {
            if ($this->permissions9[$index]['is_checked'] === true) {
                $roles[count($roles)] = $this->permissions9[$index]['name'];
            }
        }
        foreach ($this->permissions10 as $index => $item) {
            if ($this->permissions10[$index]['is_checked'] === true) {
                $roles[count($roles)] = $this->permissions10[$index]['name'];
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
