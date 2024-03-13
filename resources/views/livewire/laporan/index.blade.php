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
                <div class="col-md-2 my-2">
                    <select class="form-select" name="orders" wire:model.live="allOrders">
                        <option value="" selected>All Order</option>
                        <option value="trashed">Trashed Order</option>
                    </select>
                </div>
                <div class="col-md-2 my-2">
                    <input class="form-control me-2" type="search" placeholder="No Customer" wire:model.live="search"
                        id="searchInput">
                </div>
            </div>
            {{-- <table wire:poll.3s>
                <caption>{{ $this->allOrders === 'trashed' ? 'Trashed Orders' : 'All Orders' }}</caption>
                <tbody>
                    @forelse($order as $item)
                        <tr>
                            <td data-label="No Customer">{{ $item->order_code }}</td>
                            <td data-label="Customer Name">{{ $item->customer_name }}</td>
                            <td data-label="Total Price">Rp. {{ number_format($item->total_price, 0, ',', '.') }}</td>
                            <td data-label="Payment Method">{{ $item->payment_method }}</td>
                            <td data-label="Tanggal Order">{{ $item->created_at }}</td>
                            <td data-label="Action">
                                <a href="{{ url('laporan/' . $item->order_code) }}" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <h3>
                                    <strong>
                                        Choose Order Date Range!
                                    </strong>
                                </h3>
                            </td>

                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $order->links() }} --}}
            {{-- @livewire('laporan.itemsdatatable') --}}


        </div>


    </div>




</div>
