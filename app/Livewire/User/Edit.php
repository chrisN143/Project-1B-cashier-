<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Spatie\Permission\Models\Role;
use Livewire\Attributes\Validate;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{
    public $roles;

    public $user;
    public $user_role;
    public $userId;

    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $roleUser;
    #[Rule('required|email')]
    public $email;
    #[Rule('required|min:8')]
    public $password;

    public function update()
    {
        $this->validate();
        $user = User::find($this->userId);
        if ($this->password == $user->password && $this->email == $user->email) {
            $user->update([
                'name' => $this->name,
            ]);
            $user->assignRole($this->roleUser);
        } else {
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password)
            ]);
            $user->assignRole($this->roleUser);
        }

        Alert::toast('Data Berhasil Diperbarui', 'success');
        return redirect()->route('user.index');
    }

    public function mount()
    {
        $this->roles = Role::All()->pluck('name', 'name');

        $userEdit = User::find($this->userId);
        $this->user_role = $userEdit->getRoleNames()->first();
        $this->name = $userEdit->name;
        $this->roleUser = $userEdit->getRoleNames()->first();
        $this->email = $userEdit->email;
        $this->password = $userEdit->password;

        // return $roles;
    }

    public function render()
    {
        return view('livewire.user.edit');
    }
}
