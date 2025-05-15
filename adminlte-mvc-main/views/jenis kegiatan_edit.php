<?php
require_once __DIR__ . '/../config/DB.php'; // Ini penting untuk inisialisasi $pdo
require_once __DIR__ . '/../controllers/JenisKegiatan.php';

$jenisKegiatan = new JenisKegiatan($pdo);

$data = $jenisKegiatan->show($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updateData = ['nama' => $_POST['nama']];
    if ($jenisKegiatan->update($_GET['id'], $updateData)) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='index.php?url=jenis kegiatan';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data');</script>";
    }
}
?>

<div class="container">
    <h3>Edit Jenis Kegiatan</h3>
    <form method="post">
        <div class="mb-3">
            <label>Nama Jenis Kegiatan</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="index.php?url=jenis kegiatan" class="btn btn-secondary">Kembali</a>
    </form>
</div>
