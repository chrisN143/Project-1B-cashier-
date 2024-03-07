<div>
    <div class="row g-5 gx-xl-10 mb-5 mb-xl-10 ">
        <!--begin::Col-->
        <div class="col-md-4">
            <!--begin::Card widget 7-->
            <div class="card card-flush bg-primary bg-gradient">
                <!--begin::Header-->
                <div class="card-header py-4">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column ">
                        <!--begin::Amount-->
                        <span class="text-light fw-semibold fs-2">All orders</span>
                        <span class="fs-2 text-light lh-1 ls-n2">{{ $ordersCount }}</span>
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
        <div class="col-md-4">
            <!--begin::Card widget 7-->
            <div class="card card-flush bg-danger bg-gradient">
                <!--begin::Header-->
                <div class="card-header py-4">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="text-light  fw-semibold fs-2">Incomme</span>
                        <h4 class="fs-2 text-light lh-1 ls-n2">Rp. {{ number_format($ordersPrice, 0, ',', '.') }}</h4>

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
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
            tabindex="0">
            <div class="row py-3">
                <div class="col-md-2 my-2">
                    <input id="start" class="form-control" type="date" wire:model='start_date'>
                </div>
                <div class="col-md-2 my-2">
                    <input id="end" class="form-control" type="date" wire:model='end_date'>
                </div>
                <div class="col-md-2 my-2">
                    <select class="form-select" name="store_id" wire:model="payment">
                        <option value="" selected>All Payment Mode</option>
                        @foreach ($transaction as $method)
                            <option value="{{ $method->payment_method }}">{{ $method->payment_method }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 my-2">
                    <select class="form-select" name="orders" wire:model="allOrders">
                        <option value="" selected>All Order</option>
                        <option value="trashed">Trashed Order</option>
                    </select>
                </div>
                <div class="col-md-1 my-2">
                    <button type="submit" class="btn btn-info btn-sm" wire:click="filter">Filter</button>
                </div>
                <div class="col-md-2 my-2">
                    <input class="form-control me-2" type="search" placeholder="No Customer" wire:model.live="search"
                        id="searchInput">
                </div>
            </div>
            <table>
                <caption>{{ $this->allOrders === 'trashed' ? 'Trashed Orders' : 'All Orders' }}</caption>
                <tbody>
                    @forelse($order as $item)
                        <tr>
                            <td data-label="No Customer">{{ $item->order_code }}</td>
                            <td data-label="Customer Name">{{ $item->customer_name }}</td>
                            <td data-label="Total Price">Rp. {{ number_format($item->total_price, 0, ',', '.') }}</td>
                            <td data-label="Payment Method">{{ $item->payment_method }}</td>
                            <td data-label="Tanggal Order">{{ $item->created_at->diffForHumans() }}</td>
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
            {{ $order->links() }}
            {{-- @livewire('laporan.itemsdatatable') --}}

        </div>


    </div>
    <script>
        window.onload = function() {
            // Get the current date, month, and year
            let date = new Date();
            let date_now = date.getDate();
            let month_now = date.getMonth() + 1;
            let year_now = date.getFullYear();

            // Format the current date for the input fields
            let format =
                `${year_now}-${month_now < 10 ? '0' + month_now : month_now}-${date_now < 10 ? '0' + date_now : date_now}`;
            let format_end =
                `${year_now}-${month_now + 1 < 10 ? '0' + (month_now + 1) : month_now + 1}-${date_now < 10 ? '0' + date_now : date_now}`;

            // Set the default value for start and end date
            document.getElementById('start').value = format;
            document.getElementById('end').value = format_end;

            // Function to update the end date based on the start date
            function changeDate() {
                let start = document.getElementById('start').value;

                // Update the end date based on the selected start date
                let end_date = new Date(start);
                end_date.setMonth(end_date.getMonth() + 1);

                // Format the end date for the input field
                let format_end =
                    `${end_date.getFullYear()}-${end_date.getMonth() + 1 < 10 ? '0' + (end_date.getMonth() + 1) : end_date.getMonth() + 1}-${end_date.getDate() < 10 ? '0' + end_date.getDate() : end_date.getDate()}`;

                // Set the updated end date value
                document.getElementById('end').value = format_end;
            }

            // Attach the changeDate function to the onchange event of the start date input
            document.getElementById('start').addEventListener("change", changeDate);
        };
    </script>



</div>
