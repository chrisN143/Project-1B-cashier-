<div>
    <div class='form-group mb-3'>
        <input type='text' placeholder="Store Name" class='form-control' name="store" wire:model='store'>
        @error('store')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <button class='btn btn-primary' wire:loading.attr="disabled" wire:click.prevent='add'>
        Simpan
        <div class="spinner-border text-light" style="width: 15px;  height:15px;" wire:loading>
            <span class="visually-hidden">Loading...</span>
        </div>
    </button>
</div>
