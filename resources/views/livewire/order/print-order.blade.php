<div>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
    </head>

    <body>

        <div class="container">
            <h1>Order Receipt</h1>

            <div>
                <p><strong>Order Code:</strong> {{ $order->order_code }}</p>
                <p><strong>Nama Toko:</strong> {{ $order->store_name }}</p>
                <p><strong>Nama Customer:</strong> {{ $order->customer_name }}</p>
                <p><strong>Tanggal:</strong> {{ $order->created_at }}</p>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderitems as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->product_quantity }}</td>
                            <td>Rp. {{ number_format($item->product_price * $item->product_quantity, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="total">
                <p><strong>Total Harga:</strong> Rp. {{ number_format($order->total_price, 0, ',', '.') }}</p>
                <p><strong>{{ $order->payment_method }} : </strong> Rp.
                    {{ number_format($order->total_price, 0, ',', '.') }}</p>
            </div>
        </div>
</div>
