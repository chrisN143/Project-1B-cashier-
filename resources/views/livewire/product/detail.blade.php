<div>
    <form action="POST" enctype="multipart/form-data" wire:submit='store'>
        <div class='form-group'>
            <label>Nama</label>
            <input type='text' class='form-control' wire:model='name'>
        </div>
        <div class='form-group'>
            <label>Harga</label>
            <input type='text' class='form-control' wire:model='price'>
        </div>
        <div class="form-group">
            <label>Gambar Produk</label>
            <input type="file" class="form-control" wire:model='image'>
        </div>
        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" class="w-50 h-20 d-block my-2 rounded">
        @elseif($oldImage)
            <img src="{{ $oldImage }}" class="w-50 h-20 d-block my-2 rounded">
        @endif
        <div class="mb-3">
            <label for="category" class="form-label shadow-sm">Category</label>
            <select class="form-select" name="store_id" wire:model="store_id">
                @foreach ($store as $st)
                    @if (old('store_id') == $st->id)
                        <option value="{{ $st->id }}" selected>{{ $st->store_name }}</option>
                    @else
                        <option value="{{ $st->id }}">{{ $st->store_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" placeholder="Leave a comment here" wire:model='description' style="height: 100px"></textarea>
        </div>
        <button class='btn btn-primary' wire:click='store'>
            {{ $objId ? 'Update' : 'Create' }}
            <div class="spinner-border text-light" style="width: 15px;  height:15px;" role="status" wire:loading>
                <span class="visually-hidden">Loading...</span>
            </div>
        </button>
    </form>
</div>
