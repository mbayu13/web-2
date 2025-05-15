<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../controllers/Prodi.php';

$data = $prodi->show($_GET['id']);

// Proses update saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedData = [
        'kode' => $_POST['kode'],
        'nama' => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        'telpon' => $_POST['telpon'],
        'ketua' => $_POST['ketua']
    ];

    if ($prodi->update($id, $updatedData)) {
        echo "<script>alert('Data prodi berhasil diupdate'); window.location.href='index.php?url=prodi';</script>";
    } else {
        echo "<script>alert('Gagal update data prodi');</script>";
    }
}
?>

<div class="container">
    <h3>Edit Prodi</h3>
    <form method="post">
        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" value="<?= $data['kode'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?>">
        </div>
        <div class="mb-3">
            <label>Telpon</label>
            <input type="text" name="telpon" class="form-control" value="<?= $data['telpon'] ?>">
        </div>
        <div class="mb-3">
            <label>Ketua</label>
            <input type="text" name="ketua" class="form-control" value="<?= $data['ketua'] ?>">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="?page=prodi" class="btn btn-secondary">Kembali</a>
    </form>
</div>
