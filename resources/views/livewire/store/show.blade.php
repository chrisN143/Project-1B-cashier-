<div>
    <div class='form-group mb-3'>
        <input type='text' placeholder="Store Name" class='form-control' name="store" wire:model='store' disabled>
        @error('store')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-3">
        <a href="{{ route('store.show') }}" class="btn btn-success">Back</a>

        <button class='btn btn-primary' wire:click='add' disabled>
            {{ $objId ? 'Update' : 'Create' }}

        </button>
    </div>

</div>
