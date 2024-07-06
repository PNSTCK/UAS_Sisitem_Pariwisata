@extends('layouts.be.template')
@section('title', 'Data Tempat Wisata')
@section('content')

    <link rel="stylesheet" href="/beckend/assets/css/bootstrap.min.css">
    <style>
        .table-container {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>

    <div class="container px-1 mt-1">
        <div class="row">
            <div class="col-md-12">

                <a href="{{ route('tempat.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus me-2"></i>Tambah Data
                </a>

                <!-- Tambahkan form pencarian di atas tabel -->
                <form action="{{ route('tempat.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="cari" value="{{ $request->cari }}" class="form-control"
                            placeholder="Cari berdasarkan nama tempat...">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>

                <div class="card">
                    <div class="card-header" style="font-size: 20px; text-align: center; color: black; font-weight: bold">
                        Data Tempat Wisata</div>
                    <div class="card-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        @if ($data->isEmpty())
                            <div class="alert alert-danger">
                                Data tempat wisata belum ada.
                            </div>
                        @else
                            <div class="table-container">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr style="text-align: center; font-size: 14px">
                                            <th>No</th>
                                            <th>Nama Tempat</th>
                                            <th>Kategori</th>
                                            <th>Daya Tampung</th>
                                            <th>Fasilitas</th>
                                            <th>Deskripsi</th>
                                            <th>Gambar</th>
                                            {{-- <th>Rating</th> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $row)
                                            <tr style="text-align: center; font-size: 14px">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->nama_tempat }}</td>
                                                <td>{{ $row->kategori }}</td>
                                                <td>{{ $row->daya_tampung }}</td>
                                                <td>{{ $row->fasilitas }}</td>
                                                <td>{{ $row->deskripsi }}</td>
                                                <td>
                                                    @if ($row->gambar)
                                                        <img src="{{ asset('gallery/' . $row->gambar) }}" width="100px"
                                                            class="rounded">
                                                    @else
                                                        Gambar tidak tersedia
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $row->rating }}</td> --}}
                                                <td>
                                                    <form method="POST" action="{{ route('tempat.destroy', $row->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-transparent"
                                                            onclick="return confirm('Apakah anda yakin ingin hapus?');">
                                                            <i class="bi bi-trash" style="font-size: 20px; color: red"></i>
                                                        </button>
                                                        <a href="{{ route('tempat.edit', $row->id) }}">
                                                            <i class="fa-regular fa-pen-to-square"
                                                                style="font-size: 20px; color: green"></i>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data tempat wisata belum ada.
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
