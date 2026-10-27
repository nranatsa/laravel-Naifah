<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tambah CV - Admin</title>
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>
<body>
    <main class="content">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12 col-xl-8">
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h2 class="h4 mb-4">Tambah Data CV</h2>
                            <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Profesi</label>
                                    <input type="text" name="profesi" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No HP</label>
                                    <input type="text" name="no_hp" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Foto Profil</label>
                                    <input type="file" name="foto_profil" class="form-control" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('biodata.index') }}" class="btn btn-gray-500">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
