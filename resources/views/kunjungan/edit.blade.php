@extends('layout.be.template')
@section('title', 'Edit Kinerja/')
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

                        <form action="{{ route('kinerja.update', $kinerja->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label>Bulan</label>
                                <input type="text" name="bulan" class="form-control" value="{{ $kinerja->bulan }}">
                            </div>
                            <div class="mb-3">
                                <label for="">tahun</label>
                                <input type="number" name="tahun" class="form-control"
                                    value="{{ $kinerja->tahun }}">
                            </div>
                            <div class="mb-3">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" value="{{ $kinerja->jabatan }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Nilai</label>
                                <input type="number" name="bobot_nilai" class="form-control" value="{{ $kinerja->bobot_nilai }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" value="{{ $kinerja->keterangan }}">
                            </div>
                            <input type="submit" value="Simpan" class="btn btn-success">
                            <a href="{{ route('kinerja.index') }}" class="btn btn-warning">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
