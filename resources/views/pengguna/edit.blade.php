@extends('layouts.be.template')
@section('title', 'Edit Pengguna/')
@section('content')

    <div class="container px-1 mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-size: 20px; text-align: center; color: black">Edit Kinerja</div>
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

                        <form action="{{ route('pengguna.update', $pengguna->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label>id </label>
                                <input type="id" name="id pengguna" class="form-control" value="{{ $pengguna->id_pengguna }}">
                            </div>
                            <div class="mb-3">
                                <label for="">KTP</label>
                                <input type="number" name="KTP" class="form-control"
                                    value="{{ $pengguna->KTP }}">
                            </div>
                            <div class="mb-3">
                                <label>Nama Pengguna</label>
                                <input type="text" name="nama_pengguna" class="form-control" value="{{ $pengguna->nama_pengguna }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="{{ $pengguna->alamat }}">
                            </div>

                            <div class="mb-3">
                                <label for="">Jenis Kelamin</label>
                                <select name="jk" class="form-select">
                                    <option disabled value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L" {{ $pengguna->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $pengguna->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">hoby</label>
                                <input type="text" name="hoby" class="form-control" value="{{ $penguna->hoby }}">
                            </div>

                            <div class="mb-3">
                                <label for="">tempat dan tanggal lahir</label>
                                <input type="text" name="hoby" class="form-control" value="{{ $penguna->tanggal_lahir }}">
                            </div>
                            <input type="submit" value="Simpan" class="btn btn-success">
                            <a href="{{ route('pengguna.index') }}" class="btn btn-warning">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
