@extends('layouts/home')

@section('content')
<header class="bg-dark py-5 text-break">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">Detail Lapangan</h1>
      </div>
    </div>
  </header>
  <!-- Section-->
  <section class="py-5 text-break">
    <div class="container px-4 px-lg-5 mt-5">
      <div class="row justify-content-center">
          <div class="col-lg-8 mb-5">
            <div class="card h-100">
              <!-- Product image-->
              <img
                class="card-img-top"
                src="{{ asset('storage/'. $fields->gambar) }}"
                alt="..."
              />
              <!-- Product details-->
              <div class="card-body card-body-custom pt-4">
                <div>
                  <!-- Product name-->
                  <h3 class="fw-bolder text-primary">Deskripsi</h3>
                  <p>
                    {{ $fields->deskripsi }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card text-break">
              <!-- Product details-->
              <div class="card-body card-body-custom pt-4">
                <div class="text-center">
                  <!-- Product name-->
                  <div
                    class="d-flex justify-content-between align-items-center p-2"
                  >
                    <h5 class="fw-bolder">Harga Lapangan</h5>
                    <div class="rent-price mb-3">
                      <span style="font-size: 1rem" class="text-primary"
                        >{{ $fields->harga }}/</span
                      >Jam
                    </div>
                  </div>
                  <ul class="list-unstyled list-style-group">
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Jenis</span>
                      <span style="font-weight: 600">{{ $fields->nama }}</span>
                    </li>
                    <li
                      class="border-bottom p-2 d-flex justify-content-between"
                    >
                      <span>Status</span>
                      <span style="font-weight: 600">{{ $fields->status }}</span>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer border-top-0 bg-transparent">
                <div class="text-center">
                  <a
                    class="btn d-flex align-items-center justify-content-center btn-primary mt-auto"
                    href="{{ url('order', $fields->id) }}"
                    style="column-gap: 0.4rem"
                    >Sewa Lapangan </a>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
@endsection
