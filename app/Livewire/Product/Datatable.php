<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Datatable extends Component
{
    public $data;

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    public function render()
    {
        $this->data = Product::all();
        
        return view('livewire.product.datatable');
    }
}
