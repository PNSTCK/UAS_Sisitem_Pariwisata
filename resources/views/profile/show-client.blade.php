<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Profil Pengguna</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="/backend/assets/img/favicon.png" rel="icon">
    <link href="/backend/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="/backend/fontawesome/css/all.min.css">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="/backend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/backend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/backend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/backend/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/backend/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/backend/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/backend/assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="/backend/assets/css/style.css" rel="stylesheet">
</head>

<body>
    @include('layouts.be.top-navclient')
    @include('layouts.be.sidebar-client')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profil Pengguna</h1>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            @if ($user->foto_profil)
                                <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="Profile"
                                    class="rounded-circle">
                            @else
                                <img src="/backend/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                            @endif
                            <h2>{{ $user->name }}</h2>
                            <h3>{{ $user->hak_akses }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Detail Profil</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nama</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Hak Akses</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->hak_akses }}</div>
                                    </div>
                                </div>
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <form action="{{ route('profile.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="name" type="text" class="form-control" id="name"
                                                    value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="email"
                                                    value="{{ $user->email }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="password"
                                                class="col-md-4 col-lg-3 col-form-label">Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="password">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="password_confirmation"
                                                class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password_confirmation" type="password"
                                                    class="form-control" id="password_confirmation">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nomor_telepon" class="col-md-4 col-lg-3 col-form-label">Nomor
                                                Telepon</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nomor_telepon" type="text" class="form-control"
                                                    id="nomor_telepon" value="{{ $user->nomor_telepon }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="foto_profil" class="col-md-4 col-lg-3 col-form-label">Foto
                                                Profil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="foto_profil" type="file" class="form-control"
                                                    id="foto_profil">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.be.footer')

    <script src="/backend/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/backend/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="/backend/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/backend/assets/vendor/quill/quill.min.js"></script>
    <script src="/backend/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/backend/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/backend/assets/vendor/php-email-form/validate.js"></script>
    <script src="/backend/assets/js/main.js"></script>
</body>

</html>
