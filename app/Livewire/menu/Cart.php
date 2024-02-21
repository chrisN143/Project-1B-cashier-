<?php

namespace App\Livewire\menu;

use Livewire\Component;

class Cart extends Component
{
    public $inputQuantity = 1;
    public function decrementQuantity()
    {
        if ($this->inputQuantity < 10) {

            return $this->inputQuantity++;
        }
    }
    public function incrementQuantity()
    {
        if ($this->inputQuantity > 1) {

            return $this->inputQuantity--;
        }
    }
    public function render()
    {
        return view('livewire.menu.cart');
    }
}
