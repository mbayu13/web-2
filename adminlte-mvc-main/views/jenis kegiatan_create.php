<?php
require_once __DIR__ . '/../config/DB.php'; // Tambahkan baris ini
require_once __DIR__ . '/../controllers/JenisKegiatan.php';

$jenisKegiatan = new JenisKegiatan($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = ['nama' => $_POST['nama']];
    if ($jenisKegiatan->create($data)) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href='index.php?url=jenis kegiatan';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data');</script>";
    }
}
?>

<div class="container">
    <h3>Tambah Jenis Kegiatan</h3>
    <form method="post">
        <div class="mb-3">
            <label>Nama Jenis Kegiatan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php?url=jenis kegiatan" class="btn btn-secondary">Kembali</a>
    </form>
</div>
