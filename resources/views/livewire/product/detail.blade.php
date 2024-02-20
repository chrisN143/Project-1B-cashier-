<div>
    {{-- <form action="POST" enctype="multipart/form-data" wire:submit='store'> --}}
    <div class='form-group'>
        <label>Nama</label>
        <input type='text' class='form-control' id="name" name="name" wire:model='name'>
        @error('name')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <div class="input-group has-validation mt-3">
        <span class="input-group-text" id="inputGroupPrepend">Rp.</span>
        <input type='text' class='form-control' placeholder="Price" id="price" wire:model='price'>
        @error('price')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label>Gambar Produk</label>
        <input type="file" class="form-control" name="image" wire:model='image'>
        @error('image')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    @if ($image)
        <img src="{{ $image->temporaryUrl() }}" class="w-50 h-20 d-block my-2 rounded">
    @elseif($oldImage)
        <img src="{{ $oldImage }}" class="w-50 h-20 d-block my-2 rounded">
    @endif
    <div class="mb-3">
        <label for="category" class="form-label shadow-sm">Category</label>
        <select class="form-select" name="store_id" wire:model="store_id">
            <option value="" hidden selected></option>
            @foreach ($store as $st)
                <option value="{{ $st->id }}"{{ $objId ? 'selected' : '' }}>{{ $st->store_name }}</option>
            @endforeach
        </select>
        @error('storeId')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label>Deskripsi</label>
        <textarea class="form-control" placeholder="Leave a comment here" wire:model='description' style="height: 100px"></textarea>
        @error('description')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <button class='btn btn-primary' wire:click='store'>
        {{ $objId ? 'Update' : 'Create' }}
        <div class="spinner-border text-light" style="width: 15px;  height:15px;" role="status" wire:loading>
            <span class="visually-hidden">Loading...</span>
        </div>
    </button>
    {{-- </form> --}}
    <script src="https://unpkg.com/imask"></script>

    <script>
        const Price = document.getElementById('price');
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
            min: -10000,
            max: 10000000
        });
    </script>
</div>
