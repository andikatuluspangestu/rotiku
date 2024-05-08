<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Pesanan</title>
</head>

<body>
    <h1>Nota Pesanan</h1>
    <table>
        <tr>
            <td>Nama Pemesan</td>
            <td> : </td>
            <td>{{ $order->name }}</td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td> : </td>
            <td>{{ $order->phone }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td> : </td>
            <td>{{ $order->address }}</td>
        </tr>
        <tr>
            <td>Total Pembayaran</td>
            <td> : </td>
            <td>Rp {{ number_format($order->total) }}</td>
        </tr>
        <tr>
            <td>Status Pembayaran:</td>
            <td> : </td>
            <td>{{ $order->payment_status != 'paid' ? 'Lunas' : 'Belum Lunas' }}</td>
        </tr>
        <tr>
            <td>Status Pesanan:</td>
            <td> : </td>
            <td>
                @if ($order->shipping_status == 'completed')
                    <span class="badge bg-success">Terkirim</span>
                @elseif ($order->shipping_status == 'shipping')
                    <span class="badge bg-warning text-dark">Sedang Dikirim</span>
                @elseif ($order->shipping_status == 'processing')
                    <span class="badge bg-secondary">Dikemas</span>
                @elseif ($order->shipping_status == 'declined')
                    <span class="badge bg-danger">Dibatalkan</span>
                @else
                    <span class="badge bg-primary">Belum Dikirim</span>
                @endif
            </td>
        </tr>
    </table>

    <h2>Detail Pesanan</h2>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>No. Pesanan</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga Produk</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>Rp {{ number_format($product->price) }}</td>
                    <td>Rp {{ number_format($order->total) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <p>Terima kasih telah berbelanja di toko kami. Anda dapat melacak status pesanan Anda di halaman <a
            href="{{ route('admin.orders.show', $order->id) }}">Detail Pesanan</a></p>
</body>

</html>
