@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-box-open"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{-- Ambil Data Jumlah Produk --}}
                                            {{ $products->count() }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Produk</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-tags"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{-- Ambil Data Jumlah Kategori --}}
                                            {{ $categories->count() }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Katalog</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-basket-shopping"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{-- Ambil Data Jumlah Pesanan --}}
                                            {{ $orders->count() }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Pesanan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{-- ordersCompleted --}}
                                            {{ $ordersCompleted->count() }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Pesanan Selesai</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Users --}}
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{-- Ambil Data Jumlah User --}}
                                            {{ $users->count() }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Pengguna</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Incomes --}}
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-money-bill"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{-- Ambil Data Jumlah Pemasukan --}}
                                            Rp {{ number_format($incomes->sum('amount'), 0, ',', '.') }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Pemasukan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Customers --}}
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{-- Ambil Data Jumlah Pelanggan --}}
                                            {{ $customers->count() }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Pelanggan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
