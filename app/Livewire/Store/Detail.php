<?php

namespace App\Livewire\Store;

use App\Models\Store;
use Livewire\Attributes\Rule;
use Livewire\Component;



class Detail extends Component
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

    public function add()
    {
        $this->validate();
        if ($this->objId) {
            //Update
            $store = Store::find($this->objId);
            $store->update([
                'store_name' => $this->store,
            ]);
        } else {
            //Create
            Store::create([
                'store_name' => $this->store,
            ]);
        }

        return redirect()->route('store.index');
    }
    public function render()
    {
        return view('livewire.store.detail');
    }
}
