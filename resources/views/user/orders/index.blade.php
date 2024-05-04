@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>{{ $title }}</h3>
    </div>
    <div class="page-content">
        <section class="row">
            {{-- Table admin.categories --}}
            <div class="col-md-12">
                <div class="card p-2">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Penerima</th>
                                        <th>Alamat</th>
                                        <th>Status Pengiriman</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->address }}</td>
                                            <td>
                                                @if ($order->shipping_status == 'pending')
                                                    <span class="badge bg-warning text-dark">Menunggu Konfirmasi</span>
                                                @elseif ($order->shipping_status == 'processing')
                                                    <span class="badge bg-primary">Dikemas</span>
                                                @elseif ($order->shipping_status == 'shipping')
                                                    <span class="badge bg-secondary">Sedang Dikirim</span>
                                                @elseif ($order->shipping_status == 'completed')
                                                    <span class="badge bg-success">Diterima</span>
                                                @endif
                                            </td>
                                            <td>Rp {{ number_format($order->total) }}</td>
                                            <td>
                                                <a href="{{ route('user.orders.show', ['user' => $order->user_id, 'order' => $order->id]) }}"
                                                    class="btn btn-sm btn-info">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
