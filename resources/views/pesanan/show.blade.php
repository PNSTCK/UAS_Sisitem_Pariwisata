@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $pesanan->nama_tempat }}</h2>
                <img src="{{ asset('gallery/' . $pesanan->gambar) }}" alt="{{ $pesanan->nama_pesanan }}" width="500">
                <p><strong>Kategori:</strong> {{ $pesanan->kategori }}</p>
                <p><strong>Daya Tampung:</strong> {{ $pesanan->daya_tampung }} Orang</p>
                <p><strong>Fasilitas:</strong> {{ $pesanan->fasilitas }}</p>
                <p><strong>Rating:</strong> {{ $pesanan->rating }}</p>

                <form action="{{ route('tempat.order', $pesanan->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_orang">Jumlah Orang:</label>
                        <input type="number" name="jumlah_orang" id="jumlah_orang" class="form-control" required
                            min="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
