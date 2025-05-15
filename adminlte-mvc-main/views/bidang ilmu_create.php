<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../controllers/BidangIlmu.php';

$bidangIlmu = new BidangIlmu($pdo);

// Proses simpan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi']
    ];

    if ($bidangIlmu->create($data)) {
        echo "<script>alert('Data bidang ilmu berhasil disimpan'); window.location.href='index.php?url=bidang ilmu';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data bidang ilmu');</script>";
    }
}
?>

<div class="container">
    <h3>Tambah Data Bidang Ilmu</h3>
    <form method="POST">
        <div class="form-group mb-2">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php?url=penelitian" class="btn btn-secondary">Kembali</a>
    </form>
</div>
