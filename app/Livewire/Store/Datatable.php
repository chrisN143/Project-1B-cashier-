<?php

namespace App\Livewire\Store;
use App\Models\Store;
use Livewire\Component;

class Datatable extends Component
{
     public $data;

    public function destroy($id)
    {
        $store = Store::find($id);
        $store->delete();
    }

    public function render()
    {
      $this->data = Store::all();
        return view('livewire.store.datatable');
    }
}
