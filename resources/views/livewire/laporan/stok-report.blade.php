<div>
    {{-- @dd($this->start_date) --}}

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
                    <input class="form-control me-2" type="search" placeholder="No Customer"
                        wire:model.live="searchItems" id="searchInput">
                </div>
            </div>
            <table class="my-3" wire:poll.3s>
                <tbody>
                    @foreach ($orderItems as $item)
                        <tr>
                            <td data-label="No Order">{{ $item->order->order_code }}</td>
                            <td data-label="Product Name">{{ $item->product_name }}</td>
                            <td data-label="Product Price">Rp. {{ $item->product_price }}</td>
                            <td data-label="Product quantity">{{ $item->product_quantity }}</td>
                            <td data-label="Sub Total">Rp. {{ $item->product_price * $item->product_quantity }}</td>
                            <td data-label="Tanggal Order">{{ $item->created_at }}</td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $orderItems->links() }}

        </div>


    </div>

    <table class="my-3">
        <tbody>
            @foreach ($itemCounts as $itemCount)
                <tr>
                    <td>{{ $itemCount['product_name'] }}</td>
                    <td>{{ $itemCount['total_quantity'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
