@extends('layouts.be.template')
@section('title', 'Data Pesanan')
@section('content')

    <div class="container px-1 mt-1">
        <div class="row">
            <div class="col-md-12">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if ($pesanans->isEmpty())
                    <div class="alert alert-danger">
                        Data pesanan belum ada.
                    </div>
                @else
                    <div class="card">
                        <div class="card-header" style="font-size: 20px; text-align: center; color: black; font-weight: bold">
                            Data Pesanan
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr style="text-align: center; font-size: 14px">
                                        <th>ID</th>
                                        <th>Nama Pemesan</th>
                                        <th>Nama Tempat</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $pesanan)
                                        <tr style="text-align: center; font-size: 14px">
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->nama_pemesan }}</td>
                                            <td>{{ $data->nama_tempat }}</td>
                                            <td>{{ $data->tanggal_pesanan }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>
                                                <a href="{{ route('pesanan.edit', $pesanan->id) }}" class="btn btn-success">Edit</a>
                                                <form method="POST" action="{{ route('pesanan.destroy', $pesanan->id) }}" style="display:inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin hapus?');">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
