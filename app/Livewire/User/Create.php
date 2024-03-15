<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;



class Create extends Component
{
    public $roles;

    #[Rule('required')]
    public $name;
    #[Rule('required|unique:users|email')]
    public $email;
    #[Rule('required|min:8')]
    public $password;
    


    public function add()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect()->route('user.index');

    }

    public function mount()
    {
        $this->roles = Role::all();

    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
