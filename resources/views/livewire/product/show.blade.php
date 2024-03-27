<div>
    <div class='form-group'>
        <input type='text' class='form-control' placeholder="Product Name" id="name" name="name" wire:model='name'
            disabled>
        @error('name')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <div class="input-group has-validation mt-3">
        <span class="input-group-text" id="inputGroupPrepend">Rp.</span>
        <input type='text' class='form-control' placeholder="Price" id="price" wire:model='price' disabled>
        @error('price')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <div class='form-group mt-3'>
        <input type='text' class='form-control' placeholder="Stok" id="stok" name="stok" wire:model='stok'
            disabled>
        @error('stok')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-group mt-3">
        <input type="file" class="form-control" name="image" wire:model='image'disabled>
        @error('image')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-3">
        <select class="form-select" name="store_id" wire:model="store_id" disabled>
            <option value="" hidden selected>Category</option>
            @foreach ($store as $st)
                <option value="{{ $st->id }}"{{ $objId ? 'selected' : '' }}>{{ $st->store_name }}</option>
            @endforeach
        </select>
        @error('store_id')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mt-3">
        {{-- <label>Deskripsi</label> --}}
        <textarea class="form-control" placeholder="Add your description product" wire:model='description' style="height: 100px"
            disabled></textarea>
        @error('description')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-3">
        <a href="{{ route('product.show') }}" class="btn btn-success">Back</a>

        <button class='btn btn-primary' wire:click='add' disabled>
            {{ $objId ? 'Update' : 'Create' }}

        </button>
    </div>





    </script>
</div>
