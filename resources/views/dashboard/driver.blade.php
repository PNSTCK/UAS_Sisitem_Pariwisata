@extends('layouts.driver')

@section('content')
    <div class="container">
        <h2>Dashboard Driver</h2>
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
                            <form action="{{ route('driver.updateStatus', $pesanan->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Gunakan PUT untuk update status -->

                                <!-- Tambahkan input hidden untuk mengirim status yang dipilih -->
                                <input type="hidden" name="status" value="approved">

                                <!-- Gunakan tombol submit sebagai ganti select box -->
                                <button type="submit" class="btn btn-success" style="width: 80px;">
                                    @if ($pesanan->status == 'approved')
                                        <i class="fas fa-check-circle"></i> Approved
                                    @else
                                        Pending
                                    @endif
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
