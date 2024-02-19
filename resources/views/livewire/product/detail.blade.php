<div>
    <form action="POST" enctype="multipart/form-data" wire:submit='store'>
        <div class='form-group'>
            <label>Nomor</label>
            <input type='text' class='form-control' wire:model='code'>
        </div>
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
            <p>{{ $this->image }}</p>
            <img src="{{ $image->temporaryUrl() }}">
        @else
            {{-- {{ $image->temporaryUrl() }} --}}
            <img src="{{ asset('storage/' . $image) }}">
            <p>{{ $image }}</p>
        @endif
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" placeholder="Leave a comment here" wire:model='description' style="height: 100px"></textarea>
        </div>
        <button class='btn btn-primary'>
            Simpan
        </button>
    </form>
</div>
