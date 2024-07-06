@extends('layouts.frontend')

@section('title', 'Detail Tempat Wisata')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mb-4 shadow-sm">
                    <img src="/gallery/{{ $tempat->gambar }}" class="card-img-top" alt="{{ $tempat->nama_tempat }}">
                    <div class="card-body">
                        <h3 class="card-title">{{ $tempat->nama_tempat }}</h3>
                        <p><strong>Kategori:</strong> {{ $tempat->kategori }}</p>
                        <p><strong>Fasilitas:</strong> {{ $tempat->fasilitas }}</p>
                        <p><strong>Daya tampung:</strong> {{ $tempat->daya_tampung }} Orang</p>

                        <p class="card-text">{{ $tempat->deskripsi }}</p>

                        <!-- Rating -->
                        <div class="rating mb-2">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="fa fa-star rating-star"
                                    style="color: {{ $i <= $tempat->rating ? 'gold' : 'gray' }};"></span>
                            @endfor
                        </div>

                        <!-- Tombol Pesan -->
                        <a href="{{ route('pesanan.show', ['id' => $tempat->id]) }}" class="btn btn-primary btn-block"
                            style="padding: 10px; margin-bottom: 10px; color: white">Pesan
                            Sekarang</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <iframe src="{{ $tempat->lokasi }}" width="100%" height="400" style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
