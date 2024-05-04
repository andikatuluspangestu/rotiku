@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
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
                                        <h6 class="font-extrabold mb-2">22</h6>
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
                                        <h6 class="font-extrabold mb-2">12</h6>
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
                                        <h6 class="font-extrabold mb-2">10</h6>
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
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">17</h6>
                                        <h6 class="text-muted font-semibold">Ulasan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                {{-- Status Profile Card --}}
                <div class="card shadow-sm">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="https://cdn-icons-png.flaticon.com/512/706/706830.png" alt="avatar" class="avatar-img rounded-circle">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Renata Angelin</h5>
                                <h6 class="text-muted mb-0">@rnata</h6>
                            </div>
                        </div>
                    </div>
                    <div class="desc pb-4 pt-2 px-4">
                        You are login as Pelanggan <br> 
                        {{-- Logout Form --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm mt-2 btn-danger">Logout</button>
                        </form>
                    </div>
                </div>

                {{-- Card Detail Keuangan (pengeluaran) --}}
                <div class="card shadow-sm">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon green">
                                {{-- Arrow Up Iconly --}}
                                <i class="iconly-boldWallet"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="font-bold">Pengeluaran</h6>
                                <h6 class="text-muted mb-0">Rp. 500.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
