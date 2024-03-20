<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class ShowUser extends Component
{
    public $userId;
    public $user;
    public function mount()
    {
        $this->user = User::find($this->userId);

    }
    public function render()
    {
        return view('livewire.user.show-user');
    }
}
