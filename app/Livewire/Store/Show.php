<?php

namespace App\Livewire\Store;

use App\Models\Store;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Show extends Component
{
    public $objId;
    #[Rule('required')]
    public $store;
    public function mount()
    {
        if ($this->objId) {
            $store = Store::find($this->objId);
            $this->store = $store->store_name;
        }
    }
    public function render()
    {
        return view('livewire.store.show');
    }
}
