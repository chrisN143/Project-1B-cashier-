<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class Detail extends Component
{
    use WithFileUploads;

    public $objId;

    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $price;
    #[Rule('required')]
    public $code;
    #[Rule('nullable|sometimes|image')]
    public $image;
    #[Rule('required')]
    public $description;

    public function mount()
    {
        if ($this->objId) {
            $product = Product::find($this->objId);
            $this->name = $product->name;
            $this->price = $product->price;
            $this->code = $product->code;
            $this->description = $product->description;
        }
    }

    public function store()
    {
        $validated = $this->validate();

        if ($this->image) {
            $validated['image'] = $this->image->store('uploads', 'public');
        }

        if ($this->objId) {
            //Update
            $product = Product::find($this->objId);
            $product->update($validated);
        } else {
            //Create
            Product::create($validated);
        }

        return redirect()->route('product.index');
    }

    public function render()
    {
        return view('livewire.product.detail');
    }
}
