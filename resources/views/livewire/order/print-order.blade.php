<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="shadow bg-white p-5 rounded">
            <h4 class="mx-3  text-capitalize">
                order Details
                {{-- <a href="{{ route('orders.index') }}" class="btn btn-danger btn-sm ">back To All --}}
                {{-- Orders</a>
                            <a href="{{ url('orders/print/' . $order->order_code) }}"
                                class="btn btn-success btn-sm ">Print</a> --}}
            </h4>
            <hr>
            <div class="row p-3">
                <div class="col-md-10">


                    <h5>Tracking Id/No. : {{ $order->order_code }}</h5>
                    <h5>Order Created Date : {{ $order->created_at->format('d-m-Y h:i A') }}
                        ({{ $order->created_at->diffForHumans() }})</h5>
                    {{-- <h6>Payment Mode : {{ $order->payment_mode }}</h6> --}}
                    {{-- <h6 class="border p-2 text-success">
                                    Order status : <span class="text-Uppercase">{{ $order->status_message }}</span>
                                </h6> --}}
                </div>
                <div class="col-md-8">
                    <h4>User Details</h4>
                    <hr>
                    <h5>Full Name : {{ $order->customer_name }}</h5>
                    <h5>Payment method : {{ $order->payment_method }}</h5>
                </div>
            </div>
            <br>
            <h5>Order Items</h5>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>Item Code</th>
                        <th>image</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <th width="10%">{{ $item->product->code }}</th>
                                <th width="10%">
                                    <img src="{{ asset('storage/image/' . $item->product->image) }}"
                                        class="rounded me-3" width="80px" alt="{{ $item->product->name }}">
                                </th>
                                <th width="10%">{{ $item->product->name }}</th>

                                <th width="10%">{{ $item->product_quantity }}</th>
                                <th width="10%">Rp. {{ $item->product->price }}</th>


                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-center">
                                <h3>Total Amount :</h3>
                            </td>
                            <td colspan="2">
                                <h3>Rp. {{ $order->total_price }}</h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                </div>
            </div>
        </div>
    </div>
</div>
