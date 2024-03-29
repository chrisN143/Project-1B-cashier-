<div>
    <div class='form-group'>
        <input type='text' class='form-control border-dark border-1' placeholder="Product Name" id="name"
            name="name" wire:model='name'>
        @error('name')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <div class="input-group mt-3" wire:ignore>
        <span class="input-group-text" id="inputGroupPrepend">Rp.</span>
        <input type='text' class='form-control border-dark border-1' placeholder="Price" id="productPrice"
            wire:model='price'>
        @error('price')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <div class='form-group mt-3'>
        <input type='text' class='form-control border-dark border-1' placeholder="Stok" id="stok" name="stok"
            wire:model='stok'>
        @error('stok')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-group mt-3">
        <input type="file" class="form-control border-dark border-1" name="image" wire:model='image'>
        @error('image')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    @if ($image)
        <img src="{{ $image->temporaryUrl() }}" class="w-50 h-20 d-block my-2 rounded">
    @elseif($oldImage)
        <img src="{{ $oldImage }}" class="w-50 h-20 d-block my-2 rounded">
    @endif
    <div class="mt-3">
        <select class="form-select border-dark border-1" name="store_id" wire:model="store_id">
            <option value="" hidden selected>Category</option>
            @foreach ($store as $st)
                <option value="{{ $st->id }}"{{ $objId ? 'selected' : '' }}>{{ $st->store_name }}</option>
            @endforeach
        </select>
        @error('store_id')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mt-3 ">
        {{-- <label>Deskripsi</label> --}}
        <textarea class="form-control border-dark border-1" placeholder="Add your description product" wire:model='description'
            style="height: 100px"></textarea>
        @error('description')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>

    <button class='btn btn-primary mt-3' wire:loading.attr='disabled' wire:click='add'>
        {{ $objId ? 'Update' : 'Create' }}
        <div class="spinner-border text-light" style="width: 15px;  height:15px;" wire:loading>
            <span class="visually-hidden">Loading...</span>
        </div>
    </button>





    {{-- </form> --}}
    <script src="https://unpkg.com/imask"></script>

    <script>
        const Price = document.getElementById('productPrice');
        IMask(Price, {

            mask: Number, // enable number mask

            // other options are optional with defaults below
            scale: 2, // digits after point, 0 for integers
            thousandsSeparator: '.', // any single char
            padFractionalZeros: false, // if true, then pads zeros at end to the length of scale
            normalizeZeros: true, // appends or removes zeros at ends
            radix: ',', // fractional delimiter
            mapToRadix: ['.'], // symbols to process as radix

            // additional number interval options (e.g.)
            min: -100,
            max: 10000000
        });
    </script>
</div>
