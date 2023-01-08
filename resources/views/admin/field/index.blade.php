@extends('layouts/admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Lapangan</h3>
            <a href="{{ route('field.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lapangan</th>
                            <th>Gambar Lapangan</th>
                            <th>Jam Buka</th>
                            <th>Jam Tutup</th>
                            <th>Harga Lapangan</th>
                            <th>Status Lapangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fields as $field)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $field->nama }}</td>
                                <td><img src="{{ asset('storage/'. $field->gambar) }}" alt="" width="200"></td>
                                <td>{{ Carbon\Carbon::parse($field->jam_buka)->format('g:i A') }}</td>
                                <td>{{ Carbon\Carbon::parse($field->jam_tutup)->format('g:i A') }}</td>
                                <td>{{ $field->harga }}</td>
                                <td>{{ $field->status }}</td>
                                <td>
                                    <a href="{{ route('field.edit', $field->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('field.destroy', $field->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm border-0" onclick="return confirm('Apakah anda yakin ingin menghapus?')" value="Delete">Hapus</button>
                                    </form>
                                    {{-- <a href="" class="btn btn-sm btn-danger">Hapus</a> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection