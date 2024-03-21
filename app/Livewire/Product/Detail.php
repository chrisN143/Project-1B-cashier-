<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\Store;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class Detail extends Component
{
    use WithFileUploads;
    public $objId;
    public $oldImage;
    public $store;
    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $price;
    #[Rule('required')]

    public $stok;
    #[Rule('required')]
    public $store_id;
    #[Rule('nullable|sometimes|image|max:6140')]
    public $image;
    #[Rule('required')]
    public $description;

    public function mount()
    {
        $this->store = Store::all();
        if ($this->objId) {
            $product = Product::find($this->objId);
            $this->name = $product->name;
            $this->price = $product->price;
            $this->oldImage = $product->getImage();
            $this->store_id = $product->store_id;
            $this->stok = $product->stok;
            $this->description = $product->description;
        }
    }

    public function add()
    {

        $this->validate();

        if ($this->image != null) {
            $this->validate();
            $this->image->store('images', 'public');
        }

        if ($this->objId) {
            //Update
            $product = Product::find($this->objId);
            $product->update([
                'name' => $this->name,
                'price' => str_replace(",", ".", str_replace(".", "", $this->price)),
                'store_id' => $this->store_id,
                'stok' => $this->stok,

                'image' => $this->image != null ? $this->image->hashname() : $product->image,
                'description' => $this->description
            ]);
            Alert::toast('Data Berhasil Diperbarui', 'success');
        } else {
            //Create
            Product::create([
                'name' => $this->name,
                'price' => str_replace(",", ".", str_replace(".", "", $this->price)),
                'store_id' => $this->store_id,
                'stok' => $this->stok,
                'image' => $this->image != null ? $this->image->hashname() : null,
                'description' => $this->description
            ]);
            Alert::toast('Data Berhasil Dibuat', 'success');
        }

        return redirect()->route('product.index');
    }

    public function render()
    {
        return view('livewire.product.detail');
    }
}
