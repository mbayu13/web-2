<?php
require_once 'controllers/Prodi.php';

$prodi = new Prodi($pdo);

// Proses simpan data saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'kode' => $_POST['kode'],
        'nama' => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        'telpon' => $_POST['telpon'],
        'ketua' => $_POST['ketua']
    ];

    if ($prodi->create($data)) {
        echo "<script>alert('Data prodi berhasil disimpan'); window.location.href='index.php?url=prodi';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data prodi');</script>";
    }
}
?>

<div class="container">
    <h3>Tambah Prodi</h3>
    <form method="post">
        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>
        <div class="mb-3">
            <label>Telpon</label>
            <input type="text" name="telpon" class="form-control">
        </div>
        <div class="mb-3">
            <label>Ketua</label>
            <input type="text" name="ketua" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="?url=prodi" class="btn btn-secondary">Kembali</a>
    </form>
</div>
