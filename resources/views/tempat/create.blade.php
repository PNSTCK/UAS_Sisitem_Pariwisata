@extends('layouts.be.template')
@section('title', 'Tambah Data Tempat Wisata')
@section('content')

    <div class="container px-1 mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-size: 20px; text-align: center; color: black">Tambah Tempat Wisata
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

                        <form action="{{ route('tempat.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Nama Tempat</label>
                                <input type="text" name="nama_tempat" class="form-control" autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="">Kategori</label>
                                <select name="kategori" class="form-select">
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    <option value="Hutan">Hutan</option>
                                    <option value="Pantai">Pantai</option>
                                    <option value="Gunung">Gunung</option>
                                    <option value="Budaya">Air Terjun</option>
                                    <option value="Budaya">Budaya</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Daya Tampung</label>
                                <input type="number" name="daya_tampung" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Fasilitas</label>
                                <textarea name="fasilitas" class="form-control" rows="5"></textarea>
                            </div>


                            <div class="mb-3">
                                <label for="">Gambar</label>
                                <input type="file" name="gambar" class="form-control" autofocus>
                            </div>

                            {{-- <div class="mb-3">
                                <label for="">Rating</label>
                                <select name="kategori" class="form-select">
                                    <option value="" disabled selected>-- Pilih Rating --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div> --}}

                            <div class="mb-3">
                                <label for="rating">Rating</label>
                                <input type="number" class="form-control" id="rating" name="rating" step="1"
                                    min="0" max="5" required>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
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
