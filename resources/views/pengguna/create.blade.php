@extends('layouts.be.template')
@section('title', 'Tambah pengguna/')
@section('content')

    <div class="container px-1 mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-size: 20px; text-align: center; color: black">Tambah Pengguna </div>

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

                        <form action="{{ route('pengguna.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">id Pengguna</label>
                                <input type="id" name="id_pengguna" class="form-control" autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="">KTP</label>
                                <input type="string" name="KTP" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Nama Pengguna</label>
                                <input type="text" name="nama_pengguna" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat_pengguna" class="form-control">
                            </div>

                            <div class="mb-3">
                                <select name="jenis_kelamin" class="form-select">
                                    <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">hoby</label>
                                <input type="text" name="hoby" class="form-control">
                            </div>


                            <div class="mb-3">
                                <label for="">tanggal lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                            <input type="submit" value="Simpan" class="btn btn-success">
                            <a href="{{ route('pengguna.index') }}" class="btn btn-danger">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
