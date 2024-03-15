<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Spatie\Permission\Models\Role;
use Livewire\Attributes\Validate;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{
    public $roles;

    public $user;
    public $userId;

    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $role;
    #[Rule('required|unique:users|email')]
    public $email;
    #[Rule('required|min:8')]
    public $password;

    public function update()
    {
        $this->validate();
        $user = User::find($this->userId);
        $user->update([
            'name' => $this->name,
            'role' => $this->role,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        Alert::toast('Data Berhasil Diperbarui', 'success');
        return redirect()->route('user.index');

    }

    public function mount()
    {
        $this->roles = Role::All();
    }

    public function render()
    {
        return view('livewire.user.edit');
    }
}
