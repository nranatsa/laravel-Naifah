<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Biodata CV - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>
<body>

    <!-- SIDEBAR & NAVBAR (Disederhanakan) -->
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a href="/admin/biodata" class="nav-link active">
                        <span class="sidebar-text">Biodata CV (1145)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/pelanggan" class="nav-link">
                        <span class="sidebar-text">Pelanggan</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="content">
        <div class="py-4">
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Biodata CV (NIM 1145)</h1>
                    <p class="mb-0">Preview CV dan Pengaturan Foto Profil</p>
                </div>
                <div>
                    <a href="{{ route('biodata.create') }}" class="btn btn-success text-white">+ Tambah CV Baru</a>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- LOOPING DATA CV -->
        @forelse($biodatas as $biodata)
        <div class="row">
            <div class="col-12 col-xl-8">
                <!-- KARTU CV -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body text-center p-5">
                        @if($biodata->foto_profil)
                            <img src="{{ asset('storage/' . $biodata->foto_profil) }}" class="rounded-circle mb-3" width="150" height="150" style="object-fit: cover;">
                        @else
                            <img src="{{ asset('assets-admin/img/team/profile-picture-3.jpg') }}" class="rounded-circle mb-3" width="150">
                        @endif

                        <h2 class="h3">{{ $biodata->nama_lengkap }}</h2>
                        <p class="text-gray-500 fs-5">{{ $biodata->profesi }}</p>

                        <hr>
                        <div class="text-start mt-4">
                            <p><strong>Alamat:</strong> {{ $biodata->alamat }}</p>
                            <p><strong>Email:</strong> {{ $biodata->email }}</p>
                            <p><strong>No HP:</strong> {{ $biodata->no_hp }}</p>
                        </div>

                        <!-- TOMBOL CRUD -->
                        <div class="mt-4">
                            <a href="{{ route('biodata.edit', $biodata->id) }}" class="btn btn-warning">Edit CV & Foto</a>
                            <form action="{{ route('biodata.destroy', $biodata->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus CV?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus CV</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- JIKA BELUM ADA DATA -->
        <div class="alert alert-info">
            Belum ada data CV. Silakan klik tombol di bawah untuk membuat.
            <br><br>
            <a href="{{ route('biodata.create') }}" class="btn btn-primary">+ Tambah CV Baru</a>
        </div>
        @endforelse

    </main>

    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>
</html>
