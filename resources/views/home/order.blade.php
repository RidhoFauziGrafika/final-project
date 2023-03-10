@extends('layouts/home')

@section('content')
    <header class="bg-dark py-5 text-break">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Order Lapangan</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5 text-break">
        <div class="container px-4 px-lg-5 mt-5">
            <h3 class="text-center mb-5">Daftar Order</h3>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @if ($orders->isEmpty())
                    <p class="text-center">Tidak ada order</p>
                @endif
                @foreach ($orders as $order)
                    <div class="col mb-5">
                        <div class="card">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('storage/' . $order->field->gambar) }}" />
                            <!-- Product details-->
                            <div class="card-body card-body-custom pt-3">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder border-bottom p-2">{{ ucfirst($order->user->name) }}</h5>
                                    <h5 class="fw-bolder text-success border-bottom p-2">{{ ucfirst($order->tanggal_pemesanan) }}</h5>
                                    <!-- Product price-->
                                    <div class="rent-price mb-3">
                                        <p class="text-primary">Rp. {{ number_format($order->total_harga, 0, '.', '.') }}</p>
                                    </div>
                                    <div class="w-100 d-flex text-break align-items-center justify-content-between">
                                        <p style="font-weight: 600">{{ $order->waktu_mulai }}</p>
                                        <p style="font-weight: 600">{{ $order->waktu_selesai }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
