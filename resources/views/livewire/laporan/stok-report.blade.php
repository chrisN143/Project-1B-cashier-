<div>
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
                    <select class="form-select" name="orders" wire:model.live="storeName">
                        @foreach ($stores as $store)
                            <option value="{{ $store->store_name }}">{{ $store->store_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    @livewire('laporan.stokReportDatatable')
    <section>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f2f2f2;
            }

            .container {
                max-width: 1000px;
                margin: 20px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .table {
                width: 60%;
                border-collapse: collapse;
                margin-top: 20px;

            }

            .table th,
            .table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }

            .table th {
                background-color: #f2f2f2;
            }

            .table tr:nth-child(even) {
                background-color: #f9f9f9;

            }
        </style>

        <div class="container">
            <h2>Stock Report</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Total Quantity</th>
                    </tr>
                </thead>
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

    </section>
</div>
