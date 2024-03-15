<?php

namespace App\Livewire\User;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $roles;
    public $name;

    public function mount()
    {
        $this->roles = Role::all();
        $this->name = 
    }

    public function render()
    {
        return view('livewire.user.edit');
    }
}
