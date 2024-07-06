@extends('layout.be.template')
@section('title', 'Tambah Kinerja/')
@section('content')

    <div class="container px-1 mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-size: 20px; text-align: center; color: black">Tambah Kinerja Pegawai</div>
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

                        <form action="{{ route('kinerja.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Bulan</label>
                                <input type="text" name="bulan" class="form-control" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="">Tahun</label>
                                <input type="number" name="tahun" class="form-control">
                            </div>
                            <div class="mb-3">
                                <select name="jk" class="form-select">
                                    <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Jabatan</label>
                                <select name="jabatan" id="" class="form-select">
                                    <option value="" disabled selected>-- Pilih Jabatan --</option>
                                    @foreach ($data_kinerja as $row)
                                        <option value="{{ $row->id }}">{{ $row->jabatan }}</option>
                                    @endforeach
                                </select>

                            <div class="mb-3">
                                <label for="">Nilai</label>
                                <input type="number" name="bobot_nilai" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control">
                            </div>
                            <input type="submit" value="Simpan" class="btn btn-success">
                            <a href="{{ route('kinerja.index') }}" class="btn btn-danger">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
