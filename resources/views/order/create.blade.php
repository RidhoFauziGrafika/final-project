@extends('layouts/home')

@section('content')
  <header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">Form Order Lapangan</h1>
      </div>
    </div>
  </header>
  <!-- Section-->
  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="number" name="fields_id" id="fields_id"
                class="form-control @error('fields_id') is-invalid @enderror" required autofocus
                value="{{ old('fields_id', $field->id) }}" hidden>
            @error('fields_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <input type="number" name="total_harga" id="total_harga"
                class="form-control @error('total_harga') is-invalid @enderror" required autofocus
                value="{{ old('total_harga', $field->harga) }}" hidden>
                @error('total_harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group pb-4">
                <label for="nama">Jenis Lapangan</label>
                <input type="text" name="nama" id="nama"
                    class="form-control @error('nama') is-invalid @enderror" required autofocus
                    value="{{ old('nama', $field->nama) }}" disabled>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group pb-4">
                <label for="harga">Harga Lapangan / Jam</label>
                <input type="number" name="harga" id="harga"
                    class="form-control @error('harga') is-invalid @enderror" required autofocus
                    value="{{ old('harga', $field->harga) }}" disabled>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group pb-4">
                <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                <input type="date" name="tanggal_pemesanan" id="tanggal_pemesanan"
                    class="form-control @error('tanggal_pemesanan') is-invalid @enderror" required autofocus min="{{ Carbon\Carbon::now()->toDateString() }}">
                @error('tanggal_pemesanan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group pb-4">
                <label for="waktu_mulai">Waktu Mulai</label>
                <select name="waktu_mulai" id="waktu_mulai"
                    class="form-control @error('waktu_mulai') is-invalid @enderror" required
                    value="{{ old('waktu_mulai') }}">
                    <option selected>Pilih salah satu</option>
                    @for ($i = \Carbon\Carbon::parse($field->jam_buka)->format('H'); $i <= \Carbon\Carbon::parse($field->jam_tutup)->format('H'); $i++)
                        <option value={{ \Carbon\Carbon::createFromFormat('G', $i)->toTimeString() }}>
                            {{ $i }}:00</option>
                    @endfor
                </select>
                @error('waktu_mulai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group pb-4">
                <label for="waktu_selesai">Waktu Selesai</label>
                <select name="waktu_selesai" id="waktu_selesai"
                    class="form-control @error('waktu_selesai') is-invalid @enderror" required
                    value="{{ old('waktu_selesai') }}">
                    <option selected>Pilih salah satu</option>
                    @for ($i = \Carbon\Carbon::parse($field->jam_buka)->format('H'); $i <= \Carbon\Carbon::parse($field->jam_tutup)->format('H'); $i++)
                        <option value={{ \Carbon\Carbon::createFromFormat('G', $i)->toTimeString() }}>
                            {{ $i }}:00</option>
                    @endfor
                </select>
                @error('waktu_selesai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3">Order</button>
            </div>
        </form>
    </div>
  </section>
@endsection