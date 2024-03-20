<div class="container mx-auto p-5 border">
    <h3>Order Details</h3>
    <hr>
    <div class="row">
        <div class="col-7">
            <div class="fs-5 p-3">Order Code : <strong>{{ $order->order_code }}</strong></div>

        </div>
        <div class="col-5">
            <div class="fs-5 p-3">Nama Toko : <strong class="text-capitalize">{{ $order->store_name }}</strong>
            </div>
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col-5">
            <div class="fs-5 p-3">Nama Customer : <strong class="text-capitalize">{{ $order->customer_name }}</strong>
            </div>
        </div>
        <div class="col-5">
            <div class="fs-5 p-3">Tanggal : <strong class="text-capitalize">{{ $order->created_at }}</strong></div>
        </div>
    </div>

    <hr>

    <table class="fs-5">
        <thead class="text-center">
            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                <th class="min-w-100px sorting" style="width: 600px;"><strong>Nama Barang</strong></th>
                <th class="min-w-70px sorting text-center" style="width: 5000px;">
                    <strong>Jumlah</strong>
                </th>
                <th class="min-w-125px sorting" style="width: 1000px;">
                    <strong>Harga</strong>
                </th>
            </tr>
        </thead>
        @foreach ($order->orderitems as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td class="text-center">{{ $item->product_quantity }}</td>
                <td>Rp. {{ number_format($item->product_price, 0, ',', '.') }}</td>
            </tr>
        @endforeach

    </table>

    <div class="row justify-content-end">
        <div class="col-6">
            <hr>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-3 ">
            <div class="p-3">Harga Jual</div>
        </div>
        <div class="col-3">
            <div class="p-3">Rp. {{ number_format($order->total_price, 0, ',', '.') }}</div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-6">
            <hr>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-3   ">
            <div class="p-3">Total</div>
        </div>
        <div class="col-3">
            <div class="p-3">Rp. {{ number_format($order->total_price, 0, ',', '.') }}</div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-3   ">
            <div class="p-3">Tunai</div>
        </div>
        <div class="col-3">
            <div class="p-3">Rp. {{ number_format($order->total_price, 0, ',', '.') }}</div>
        </div>
    </div>


</div>
