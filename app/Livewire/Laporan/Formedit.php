<?php

namespace App\Livewire\Laporan;

use App\Models\Order;
use Livewire\Component;

class Formedit extends Component
{
   public $objId;
   public $status;

    public $EditingOrderID;

    public $EditingOrderStatus;

    public function mount()
    {
        if ($this->objId) {
            // $order = Order::where('order_code', $this->objId)->get();
            $this->status = $this->objId->status_message;
        }
    }

    public function submit()
    {

        $this->objId->update(['status_message' => $this->status]);
        return redirect()->route('laporan.index');


    }

    public function render()
    {
        return view('livewire.laporan.formedit');
    }
}
