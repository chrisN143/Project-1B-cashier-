    <div class="card">
        <!--begin::Card header-->
        <div class="card-body py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="shadow bg-white p-5 rounded">
                            <h4 class="mx-3  text-capitalize">
                                My order Details
                                <a href="{{ route('orders.index') }}" class="btn btn-danger btn-sm ">back To All
                                    Orders</a>
                                <a href="{{ url('orders/print/' . $order->order_code) }}"
                                    class="btn btn-success btn-sm ">Print</a>
                            </h4>
                            <hr>
                            <div class="row p-5">
                                <div class="col-md-8">
                                    <h5>Order Details</h5>
                                    <hr>

                                    <h6>Tracking Id/No. : {{ $order->order_code }}</h6>
                                    <h6>Order Created Date : {{ $order->created_at->format('d-m-Y h:i A') }}
                                        ({{ $order->created_at->diffForHumans() }})</h6>
                                    <h6>Payment Mode : {{ $order->payment_mode }}</h6>
                                    {{-- <h6 class="border p-2 text-success">
                                        Order status : <span class="text-Uppercase">{{ $order->status_message }}</span>
                                    </h6> --}}
                                </div>
                                <div class="col-md-8">
                                    <h4>User Details</h4>
                                    <hr>
                                    <h6>Full Name : {{ $order->customer_name }}</h6>
                                    <h6>Payment method : {{ $order->payment_method }}</h6>
                                </div>
                            </div>
                            <br>
                            <h5>Order Items</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Items Id</th>
                                        <th>Product</th>
                                        <th>Quantity</th>

                                        <th>Price</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderItems as $item)
                                            <tr>
                                                <th width="10%">{{ $item->product->code }}</th>

                                                <th width="10%">{{ $item->product_name }}</th>
                                                <th width="10%">{{ $item->product_quantity }}</th>

                                                <th width="10%">Rp. {{ $item->product_price }}</th>


                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-center">Total Amount :</td>
                                            <td>Rp. {{ $order->total_price }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
