<div>
    {{-- @dd($this->start_date) --}}
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
            <table wire:poll.3s>
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

        </div>


    </div>
    {{-- <script>
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
    </script> --}}


</div>
