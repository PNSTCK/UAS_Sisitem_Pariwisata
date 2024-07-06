@extends('layouts.be.template')
@section('title', 'Edit Data Tempat Wisata')
@section('content')

    <div class="container px-1 mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-size: 20px; text-align: center; color: black">Edit Tempat Wisata
                    </div>

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('tempat.update', $tempat->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Nama Tempat</label>
                                <input type="text" name="nama_tempat" class="form-control"
                                    value="{{ $tempat->nama_tempat }}" autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="">Kategori</label>
                                <select name="kategori" class="form-select">
                                    <option value="" disabled>-- Pilih Kategori --</option>
                                    <option value="Hutan" {{ $tempat->kategori == 'Hutan' ? 'selected' : '' }}>Hutan
                                    </option>
                                    <option value="Pantai" {{ $tempat->kategori == 'Pantai' ? 'selected' : '' }}>Pantai
                                    </option>
                                    <option value="Gunung" {{ $tempat->kategori == 'Gunung' ? 'selected' : '' }}>Gunung
                                    </option>
                                    <option value="Budaya" {{ $tempat->kategori == 'Budaya' ? 'selected' : '' }}>Budaya
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Daya Tampung</label>
                                <input type="number" name="daya_tampung" class="form-control"
                                    value="{{ $tempat->daya_tampung }}">
                            </div>

                            <div class="mb-3">
                                <label for="">Fasilitas</label>
                                <textarea name="fasilitas" class="form-control" rows="5">{{ $tempat->fasilitas }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="form-control">
                                <img src="public/gallery/{{ $tempat->gambar }}" width="300px">
                            </div>

                            <div class="mb-3">
                                <label for="">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="5">{{ $tempat->deskripsi }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Lokasi</label>
                                <input type="text" class="form-control" name="lokasi" value="{{ $tempat->lokasi }}">
                            </div>

                            <input type="submit" value="Simpan" class="btn btn-success">
                            <a href="{{ route('tempat.index') }}" class="btn btn-danger btn-block">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
