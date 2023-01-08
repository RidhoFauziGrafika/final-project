@extends('layouts/admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Form Tambah Data
        </div>
        <div class="card-body">
            <form action="/admin/field/" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Lapangan</label>
                    <input type="text" name="nama" id="nama"
                        class="form-control @error('nama') is-invalid @enderror" required autofocus
                        value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug Lapangan</label>
                    <input type="text" name="slug" id="slug"
                        class="form-control @error('slug') is-invalid @enderror" required value="{{ old('slug') }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga Lapangan</label>
                    <input type="number" name="harga" id="harga"
                        class="form-control @error('harga') is-invalid @enderror" required value="{{ old('harga') }}">
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Lapangan</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30"
                        rows="5" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jam_buka">Jam Buka</label>
                    <input type="time" name="jam_buka" id="jam_buka"
                        class="form-control @error('jam_buka') is-invalid @enderror" required autofocus
                        value="{{ old('jam_buka') }}">
                    @error('jam_buka')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jam_tutup">Jam Tutup</label>
                    <input type="time" name="jam_tutup" id="jam_tutup"
                        class="form-control @error('jam_tutup') is-invalid @enderror" required autofocus
                        value="{{ old('jam_tutup') }}">
                    @error('jam_tutup')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Lapangan</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5" width="200">
                    <input type="file" name="gambar" id="gambar"
                        class="form-control @error('gambar') is-invalid @enderror" required value="{{ old('gambar') }}"
                        onchange="previewImage()">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status Lapangan</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                        required value="{{ old('status') }}">
                        <option value="" selected>Pilih salah satu</option>
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak tersedia">Tidak Tersedia</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const nama = document.querySelector("#nama");
        const slug = document.querySelector("#slug");
        nama.addEventListener("keyup", function() {
            let preslug = nama.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
        function previewImage() {
            const gambar = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(gambar.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection