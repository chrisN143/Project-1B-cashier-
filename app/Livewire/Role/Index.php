<?php

namespace App\Livewire\Role;

use Livewire\WithPagination;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;

class Index extends Component
{
        

        public function render(){
        return view('livewire.roles.index');
        }       
}