@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>
                        {{ $title }}
                    </h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.orders.index', ['user' => Auth::user()->id]) }}">Pesanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <div class="panel-body no-padding">
                        {{-- Tombol Print --}}
                        <div class="text-start">
                            <a href="" class="btn btn-primary" target="_blank">
                                <i class="bi bi-printer"></i> Print
                            </a>
                        </div>
                        <hr>
                        <div class="row">

                            {{-- Detail Pesanan --}}
                            <div class="col-md-6">
                                <h4>
                                    Detail Pesanan
                                </h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nomor Pesanan</th>
                                        <td>{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Pesanan</th>
                                        <td>{{ $order->type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat</th>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>Rp {{ number_format($order->total) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status Pengiriman</th>
                                        <td>
                                            @if ($order->shipping_status == 'completed')
                                                <span class="badge bg-success text-dark">Terkirim</span>
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
                                    <tr>
                                        <th>Status Pesanan</th>
                                        <td>
                                            @if ($order->accepted_status == 'completed')
                                                <span class="badge bg-warning text-dark">Diterima</span>
                                            @elseif ($order->shipping_status == 'shipping')
                                                {{-- Tombol Konfirmasi Pesanan Diterima --}}
                                                @if ($order->accepted_status == 'pending' && $order->payment_status == 'paid')
                                                    <form
                                                        action="{{ route('admin.orders.completed', ['user' => Auth::user()->id, 'order' => $order->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="accepted_status" value="completed">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-success">Konfirmasi Diterima</button>
                                                    </form>
                                                @endif
                                            @else
                                                <span class="badge bg-danger">Belum Diterima</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            {{-- Detail Customer --}}
                            <div class="col-md-6">
                                <h4>Detail Customer</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <td>{{ $order->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. Telepon</th>
                                        <td>{{ $order->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Pengiriman</th>
                                        <td>{{ $order->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Catatan Pembeli</th>
                                        <td>
                                            @if ($order->description)
                                                {{ $order->description }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12">
                                <h4>Detail Pembayaran</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Status Pembayaran</th>
                                        <td>
                                            @if ($order->payment_status == 'paid')
                                                <span class="badge bg-success">Lunas</span>
                                            @elseif ($order->payment_status == 'pending')
                                                <span class="badge bg-warning text-dark">Menunggu Konfirmasi Admin</span>
                                            @else
                                                <span class="badge bg-danger">Belum Dibayar</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->payment_status == 'pending')
                                                <form
                                                    action="{{ route('admin.orders.confirmPayment', ['user' => Auth::user()->id, 'order' => $order->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="payment_status" value="paid">
                                                    <button type="submit" class="btn btn-sm btn-success">Konfirmasi
                                                        Pembayaran</button>
                                                </form>
                                            @elseif ($order->payment_status == 'paid')
                                                <form
                                                    action="{{ route('admin.orders.confirmPayment', ['user' => Auth::user()->id, 'order' => $order->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="payment_status" value="pending">
                                                    <button type="submit" class="btn btn-sm btn-warning">Batalkan
                                                        Pembayaran</button>
                                                </form>
                                            @else 
                                                <small>
                                                    *Konfirmasi pembayaran jika sudah menerima pembayaran dari customer
                                                </small>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Bukti Pembayaran</th>
                                        <td>
                                            @if ($order->payment_proof)
                                                <a href="{{ asset('storage/orders/payment_proofs/' . $order->payment_proof) }}"
                                                    target="_blank">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa-solid fa-image"></i> Lihat Bukti Pembayaran
                                                    </button>
                                                </a>
                                            @else
                                                <span class="badge bg-danger">Belum Diupload</span>
                                            @endif
                                        </td>
                                        <td>
                                            <small>
                                                *Upload bukti pembayaran jika status pembayaran belum lunas
                                            </small>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12">
                                <tr>
                                    <h4>Detail Produk Pesanan</h4>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Subtotal</th>
                                            </tr>
                                            <tr>
                                                @foreach ($order->products as $product)
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->pivot->quantity }}</td>
                                                    <td>Rp {{ number_format($product->price) }}</td>
                                                    <td>Rp {{ number_format($product->price * $product->pivot->quantity) }}</td>
                                                @endforeach
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
