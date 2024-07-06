<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/libraries/swiper-bundle.min.css') }}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/style.css') }}" />
</head>

<body>

    <div class="container">
        <h1>Buat Pesanan untuk {{ $pesanan->nama_pesanan }}</h1>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pesanan.store') }}" method="POST">
            @csrf

            <!-- Hidden Field for Tempat Wisata ID -->
            <input type="hidden" name="tempat_wisata_id" value="{{ $pesanan->id }}">

            <!-- Form Group for Tanggal -->
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <!-- Form Group for Jumlah Orang -->
            <div class="form-group">
                <label for="jumlah_orang">Jumlah Orang</label>
                <input type="number" name="jumlah_orang" id="jumlah_orang" class="form-control" required>
            </div>

            <!-- Form Group for Lokasi Penjemputan -->
            <div class="form-group">
                <label for="lokasi_penjemputan">Lokasi Penjemputan</label>
                <input type="text" name="lokasi_penjemputan" id="lokasi_penjemputan" class="form-control">
            </div>

            <!-- Form Group for Waktu Penjemputan -->
            <div class="form-group">
                <label for="waktu_penjemputan">Waktu Penjemputan (Jam)</label>
                <input type="time" name="waktu_penjemputan" id="waktu_penjemputan" class="form-control" required>
            </div>

            <!-- Form Group for Kebutuhan Khusus -->
            <div class="form-group">
                <label for="kebutuhan_khusus">Kebutuhan Khusus</label>
                <textarea name="kebutuhan_khusus" id="kebutuhan_khusus" class="form-control"></textarea>
            </div>

            <!-- Form Group for Kontak -->
            <div class="form-group">
                <label for="kontak">Kontak (Nomor HP)</label>
                <input type="tel" name="kontak" id="kontak" class="form-control" required pattern="[0-9]{10,14}"
                    title="Masukkan nomor HP yang valid (10-14 digit)">
                <small class="form-text text-muted">Contoh: 081234567890</small>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
            <a href="{{ route('homepage') }}" class="btn btn-secondary">Kembali ke Home</a>
        </form>
    </div>

</body>

</html>
