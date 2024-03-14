<div>
    @livewire('laporan.index-income')
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="row py-3">
                <div class="col-md-2 my-2">
                    <input id="start" class="form-control" type="date" wire:model.live='start_date'>
                </div>
                <div class="col-md-2 my-2">
                    <input id="end" class="form-control" type="date" wire:model.live='end_date'>
                </div>
                <div class="col-md-2 my-2">
                    <select class="form-select" name="store_id" wire:model.live="payment">
                        <option value="" selected>All Payment Mode</option>
                        @foreach ($transaction as $method)
                            <option value="{{ $method->payment_method }}">{{ $method->payment_method }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="col-md-2 my-2">
                    <select class="form-select" name="orders" wire:model.live="allOrders">
                        <option value="" selected>All Order</option>
                        <option value="trashed">Trashed Order</option>
                    </select>
                </div> --}}
            </div>



        </div>


    </div>




</div>
