<div>
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
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="row py-3">
                <div class="col-md-2 my-2">
                    <input id="start" class="form-control" type="date" wire:model='start_date'>
                </div>
                <div class="col-md-2 my-2">
                    <input id="start" class="form-control" type="date" wire:model='end_date'>
                </div>
                <div class="col-md-1 my-2">
                    <button type="submit" class="btn btn-info btn-sm" wire:click="filter">Filter</button>
                </div>
                <div class="col-md-2 my-2">
                    <input class="form-control me-2" type="search" placeholder="No Customer"
                        wire:model.live="searchItems" id="searchInput">
                </div>
            </div>
            <table>
                <tbody>
                    @foreach ($orderItems as $item)
                        <tr>
                            <td data-label="No Order">{{ $item->order->order_code }}</td>
                            <td data-label="Product Name">{{ $item->product_name }}</td>
                            <td data-label="Product Price">Rp. {{ $item->product_price }}</td>
                            <td data-label="Product quantity">{{ $item->product_quantity }}</td>
                            <td data-label="Sub Total">Rp. {{ $item->product_price * $item->product_quantity }}</td>
                            <td data-label="Tanggal Order">{{ $item->created_at->diffForHumans() }}</td>

                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div>


    </div>

</div>
