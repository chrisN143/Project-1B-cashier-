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
                        <span class="text-light fw-semibold fs-2">All orders</span>
                        <span class="fs-2 text-light lh-1 ls-n2">{{ $this->ordersCount }}</span>
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
            <div class="card card-flush bg-warning bg-gradient">
                <!--begin::Header-->
                <div class="card-header py-4">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="text-light fw-semibold fs-2">Roles</span>
                        <span class="fs-2hx fw-bold text-light me-2 lh-1 ls-n2"></span>
                        <span class="text-light fw-semibold fs-6">Created At</span>
                        <!--end::Amount-->
                        <!--begin::Subtitle-->
                        <!--end::Subtitle-->
                    </div>
                    <span class="float-right display-5 bg-opacity-25"><i
                            class="fa-solid fa-cart-shopping fs-1 text-light"></i></span>
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
            <div class="card card-flush bg-success bg-gradient">
                <!--begin::Header-->
                <div class="card-header py-4">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="text-light  fw-semibold fs-4">Permissions</span>
                        <span class="fs-2hx fw-bold text-light lh-1 ls-n2"></span>
                        <span class="text-light fw-semibold fs-6">Created At</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <!--end::Subtitle-->
                    </div>
                    <span class="float-right display-5 bg-opacity-25"><i
                            class="fa-solid fa-cart-shopping fs-1 text-light"></i></span>
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

    <!--end::Col-->
    <div class="row py-3">
        <div class="col-md-2">
            <input id="start" class="form-control" type="date" wire:model='start_date'>
        </div>
        <div class="col-md-2">
            <input id="end" class="form-control" type="date" wire:model='end_date'>
        </div>
        <div class="col-md-1">
            <button type="submit"wire:click="filter">Filter</button>
        </div>
        <div class="col-md-2">
            {{-- <form class="d-flex"> --}}
            <input class="form-control me-2" type="search" placeholder="No Customer" aria-label="Search"
                id="searchInput">

            {{-- </form> --}}
        </div>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
            tabindex="0">
            <table>
                <caption>Order Information</caption>
                <tbody>
                    @foreach ($order as $index => $item)
                        <tr>
                            <td data-label="No">{{ $index + 1 }}</td>
                            <td data-label="No Customer">{{ $item->customer_name }}</td>
                            <td data-label="Total Harga">{{ $item->total_price }}</td>
                            <td data-label="Tipe Pembayaran">{{ $item->payment_method }}</td>
                            <td data-label="Tanggal Order">{{ $item->created_at->diffForHumans() }}</td>
                            <td data-label="Action">
                                <a href="{{ url('laporan/' . $item->order_code) }}" class="btn btn-primary">Detail</a>
                                <a href="{{ url('laporan/edit/' . $item->order_code) }}"
                                    class="btn btn-success">Edit</a>
                            </td>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $order->links() }}
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
            tabindex="0">
            ...</div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
            tabindex="0">
            ...</div>
        {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div> --}}
    </div>
    <script>
        // When the web is loaded
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
