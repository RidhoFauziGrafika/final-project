
@extends('layouts/admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Order</h3>
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
                            <th>Nama Pemesan</th>
                            <th>Tanggal pemesanan</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Total Harga</th>
                            <th>Nama Lapangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->tanggal_pemesanan }}</td>
                                <td>{{ $order->waktu_mulai }}</td>
                                <td>{{ $order->waktu_selesai }}</td>
                                <td>{{ $order->total_harga }}</td>
                                <td>{{ $order->field->nama }}</td>
                                <td>
                                    <form action="{{ route('kelola-order.destroy', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm border-0" onclick="return confirm('Apakah anda yakin ingin menghapus?')" value="Delete">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection