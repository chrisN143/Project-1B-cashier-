<div>
    <div class='form-group'>
        <input type='text' placeholder="Payment method" class='form-control' wire:model='name' disabled>
        @error('name')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>


    <div class="mt-3">
        <a href="{{ route('transaction.show') }}" class="btn btn-success">Back</a>

        <button class='btn btn-primary' wire:click='add' disabled>
            {{ $objId ? 'Update' : 'Create' }}

        </button>
    </div>

</div>
