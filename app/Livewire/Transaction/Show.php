<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Show extends Component
{
    public $objId;

    #[Rule('required|min:2|max:50')]
    public $name;


    public function mount()
    {
        if ($this->objId) {
            $transaction = Transaction::find($this->objId);
            $this->name = $transaction->payment_method;
        }
    }

    public function render()
    {
        return view('livewire.transaction.show');
    }
}
