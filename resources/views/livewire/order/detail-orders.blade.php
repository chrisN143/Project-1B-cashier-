<div class="card">
    <!--begin::Card header-->
    <div class="card-body py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="shadow bg-white p-5 rounded">
                        <h4 class="mx-3 text-capitalize">My Order Details</h4>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <a href="{{ route('orders.index') }}" class="btn btn-danger btn-xs">Back</a>
                                <a href="{{ url('orders/print/' . $order->order_code) }}"
                                    class="btn btn-success btn-sm">Print</a>
                            </div>

                        </div>
                        <hr>
                        <div class="row p-3">
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <hr>
                                <h6>Tracking Id/No.: {{ $order->order_code }}</h6>
                                <h6>Order Created Date: {{ $order->created_at->format('d-m-Y h:i A') }}
                                    ({{ $order->created_at->diffForHumans() }})</h6>

                            </div>
                            <div class="col-md-6">
                                <h5>User Details</h5>
                                <hr>
                                <h6>Customer Name : {{ $order->customer_name }}</h6>
                                <h6>Payment Method: {{ $order->payment_method }}</h6>
                            </div>
                        </div>
                        <hr>
                        <h5>Order Items</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Items Id</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalprice = 0;
                                    @endphp
                                    @foreach ($order->orderItems as $item)
                                        <tr>
                                            <td>{{ $item->product->code }}</td>
                                            <td>{{ $item->product_name }}</td>
                                            <td>{{ $item->product_quantity }}</td>
                                            <td>Rp.
                                                {{ number_format($item->product_price * $item->product_quantity, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        @php
                                            $totalprice += $item->product_price * $item->product_quantity;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="3" class="text-center">Total Price :</td>
                                        <td>Rp. {{ number_format($totalprice, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-center">PPN 12% :</td>
                                        <td>Rp. {{ number_format($totalprice * 0.12, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-center">Total Amount :</td>
                                        <td>Rp. {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
