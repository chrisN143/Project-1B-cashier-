<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
    #[Rule('required')]
    public $userRole;
    #[Rule('required|unique:users|email')]
    public $email;
    #[Rule('required|min:8')]
    public $password;
    public $confirmPassword;



    public function add()
    {
        $this->validate();
        if ($this->password != $this->confirmPassword) {
            Alert::toast('Konfirmasi Password Gagal', 'error');
            return redirect()->route('user.create');
        }
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $user->assignRole($this->userRole);

        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect()->route('user.index');
    }

    public function mount()
    {
        $this->roles = Role::All()->pluck('name', 'name');
    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
