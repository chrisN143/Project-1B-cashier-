<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use App\Models\Transaction;

class Index extends Component
{   

    public $data;

    

    public function destroy($id)
    {
        $product = Transaction::find($id);
        $product->delete();
    }

    public function render()
    {
        $this->data = Transaction::all();
        
        return view('livewire.transaction.index');
    }

}


