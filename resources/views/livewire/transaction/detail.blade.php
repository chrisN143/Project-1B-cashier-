<div>

    <div class='form-group'>
        <input type='text' placeholder="Payment method" class='form-control' wire:model='name'>
        @error('name')
            <span class="text-danger font-italic">{{ $message }}</span>
        @enderror
    </div>

    <button class='btn btn-info mt-3' wire:click='add'>
        {{ $objId ? 'Update' : 'Create' }}  
        <div class="spinner-border text-light" style="width: 15px;  height:15px;" wire:loading>
            <span class="visually-hidden">Loading...</span>
        </div>
    </button>

</div>
