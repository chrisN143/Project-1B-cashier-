<div >
    {{-- <form> --}}
        <div class="mb-3">
          <h4>Status</h4>
          <input type="text" wire:model="status" class="form-control" id="status">
        </div>
        <button wire:click.prevent="submit" type="submit" class="btn btn-primary">Submit</button>
    {{-- </form> --}}
</div>

