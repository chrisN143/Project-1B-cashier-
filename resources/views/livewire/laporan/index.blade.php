<div>
    <div class="row g-5 gx-xl-10 mb-5 mb-xl-10 ">
        <!--begin::Col-->
        <div class="col-md-3">
            <!--begin::Card widget 7-->
            <div class="card card-flush bg-primary bg-gradient">
                <!--begin::Header-->
                <div class="card-header py-4">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column ">
                        <!--begin::Amount-->
                        <span class="text-light fw-semibold fs-4">All orders</span>
                        <span class=" text-light lh-1 ls-n2">{{ $this->ordersCount }}</span>
                        <span class="text-light fw-semibold fs-6">Created At</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <!--end::Subtitle-->
                    </div>
                    <span class="float-right display-5 bg-opacity-25"><i
                            class="fa-solid fa-list fs-1 text-light"></i></span>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 7-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-3">
            <!--begin::Card widget 7-->
            <div class="card card-flush bg-danger bg-gradient">
                <!--begin::Header-->
                <div class="card-header py-4">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="text-light  fw-semibold fs-4">Incomme</span>
                        <h4 class=" text-light lh-1 ls-n2">Rp.{{ $totalprice }}</h4>
                        <span class="text-light fw-semibold fs-6">Created At</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <!--end::Subtitle-->
                    </div>
                    <span class="float-right display-5 bg-opacity-25"><i
                            class="fa-solid fa-dollar-sign fs-1 text-light"></i></span>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 7-->
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

    <!--end::Col-->
    <div class="row py-3">
        <div class="col-md-2">
            <input id="start" class="form-control" type="date" wire:model='start_date'>
        </div>
        <div class="col-md-2">
            <input id="start" class="form-control" type="date" wire:model='end_date'>
        </div>
        <div class="col-md-2">
            <select class="form-select" name="store_id" wire:model="payment">
                <option value="" hidden selected>All Payment Mode</option>
                @foreach ($transaction as $method)
                    <option value="{{ $method->payment_method }}">{{ $method->payment_method }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-info btn-sm" wire:click="filter">Filter</button>
        </div>
        <div class="col-md-2">
            {{-- <form class="d-flex"> --}}
            <input class="form-control me-2" type="search" placeholder="No Customer" wire:model.live="search"
                id="searchInput">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">all</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="order-items-tab" data-bs-toggle="tab" data-bs-target="#order-items-tab-pane"
                type="button" role="tab" aria-controls="order-items-tab-pane" aria-selected="false">Order
                items</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Trashed
                Order</button>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
            tabindex="0">
            <div class="row py-3">
                <div class="col-md-2">
                    <input id="start" class="form-control" type="date" wire:model='start_date'>
                </div>
                <div class="col-md-2">
                    <input id="start" class="form-control" type="date" wire:model='end_date'>
                </div>
                <div class="col-md-2">
                    <select class="form-select" name="store_id" wire:model="payment">
                        <option value="" selected>All Payment Mode</option>
                        @foreach ($transaction as $method)
                            <option value="{{ $method->payment_method }}">{{ $method->payment_method }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-info btn-sm" wire:click="filter">Filter</button>
                </div>
                <div class="col-md-2">
                    {{-- <form class="d-flex"> --}}
                    <input class="form-control me-2" type="search" placeholder="No Customer" wire:model.live="search"
                        id="searchInput">

                    {{-- </form> --}}
                </div>
            </div>
            <table>
                <caption>Order Information</caption>
                <tbody>
                    @foreach ($order as $item)
                        <tr>
                            <td data-label="No Customer">{{ $item->order_code }}</td>
                            <td data-label="No Customer">{{ $item->customer_name }}</td>
                            <td data-label="Total Harga">{{ $item->total_price }}</td>
                            <td data-label="Tipe Pembayaran">{{ $item->payment_method }}</td>
                            <td data-label="Tanggal Order">{{ $item->created_at->diffForHumans() }}</td>
                            <td data-label="Action">
                                <a href="{{ url('laporan/' . $item->order_code) }}" class="btn btn-primary">Detail</a>
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $order->links() }}
        </div>

        <div class="tab-pane fade" id="order-items-tab-pane" role="tabpanel" aria-labelledby="order-items-tab"
            tabindex="0">

            <table>
                <caption>Order Information</caption>
                <tbody>
                    @foreach ($orderItems as $item)
                        <tr>
                            <td data-label="No">{{ $item->order->order_code }}</td>
                            <td data-label="No Customer">{{ $item->product_name }}</td>
                            <td data-label="Total Harga">{{ $item->product_price }}</td>
                            <td data-label="Tipe Pembayaran">{{ $item->product_quantity }}</td>
                            <td data-label="Tanggal Order">{{ $item->created_at->diffForHumans() }}</td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
            tabindex="0">
            ...</div>
        {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div> --}}
    </div>


</div>
