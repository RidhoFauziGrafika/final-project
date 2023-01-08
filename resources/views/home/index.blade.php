@extends('layouts/home')

@section('content')
  <header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">Welcome to Renfield</h1>
      </div>
    </div>
  </header>
  <!-- Section-->
  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
      <h3 class="text-center mb-5">Daftar Lapangan</h3>
      @if (session()->has('success'))                
      <div class="alert alert-success" role="alert">
          {{ session('success') }}
      </div>
      @endif
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @foreach ($fields as $field)
          <div class="col mb-5">
            <div class="card">
                <!-- Product image-->
                <img class="card-img-top" src="{{ asset('storage/'. $field->gambar) }}"/>
                <!-- Product details-->
                <div class="card-body card-body-custom pt-3">
                  <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder border-bottom p-2">Harga Lapangan</h5>
                    <!-- Product price-->
                    <div class="rent-price mb-3">
                      <span class="text-primary">{{ $field->harga }}/</span>Jam
                    </div>
                    <ul class="list-unstyled list-style-group">
                      <li
                        class="border-bottom p-2 d-flex justify-content-between"
                      >
                        <span>Jenis</span>
                        <span style="font-weight: 600">{{ $field->nama }}</span>
                      </li>
                      <li
                        class="border-bottom p-2 d-flex justify-content-between"
                      >
                        <span>Status</span>
                        <span style="font-weight: 600">{{ $field->status }}</span>
                      </li>
                    </ul>
                  </div>
                </div>
              
              <!-- Product actions-->
              <div class="card-footer border-top-0 bg-transparent">
                <div class="text-center">
                  <a class="btn btn-primary mt-auto" href="{{ url('order', $field->id) }}">Sewa</a>
                  <a
                    class="btn btn-info mt-auto text-white"
                    href="{{ url('detail', $field->id) }}"
                    >Detail</a
                  >
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection