@extends('layouts.client')

@section('content')
    <div class="container">
        <h2>Dashboard Client</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pemesan</th>
                    <th>Tempat Wisata</th>
                    <th>Tanggal</th>
                    <th>Jumlah Orang</th>
                    <th>Lokasi Penjemputan</th>
                    <th>Waktu Penjemputan</th>
                    <th>Kebutuhan Khusus</th>
                    <th>Kontak</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $pesanan)
                    <tr>
                        <td>{{ $pesanan->id }}</td>
                        <td>{{ $pesanan->user->name }}</td>
                        <td>{{ $pesanan->tempatWisata->nama_tempat }}</td>
                        <td>{{ $pesanan->tanggal }}</td>
                        <td>{{ $pesanan->jumlah_orang }}</td>
                        <td>{{ $pesanan->lokasi_penjemputan }}</td>
                        <td>{{ $pesanan->waktu_penjemputan }}</td>
                        <td>{{ $pesanan->kebutuhan_khusus }}</td>
                        <td>{{ $pesanan->kontak }}</td>
                        <td>
                            {{ $pesanan->status }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
