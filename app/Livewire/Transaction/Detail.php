<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\Rule;

class Detail extends Component
{
    public $objId;

    #[Rule('required|min:2|max:50')]
    public $name;


    public function mount()
    {
        if ($this->objId) {
            $transaction = Transaction::find($this->objId);
            $this->name = $transaction->payment_method  ;
        }
    }

    public function add()
    {
        $this->validate();
        if ($this->objId) {
            //Update
            $transaction = Transaction::find($this->objId);
            $transaction->update([
                'payment_method' => $this->name,
            ]);
        } else {
            Transaction::create([
                'payment_method' => $this->name,
            ]);
        }

        return redirect()->route('transaction.index');
    }

    public function render()
    {
        return view('livewire.transaction.detail');
    }
}
