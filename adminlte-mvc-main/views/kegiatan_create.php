<?php
require_once __DIR__ . '/../config/DB.php'; // Tambahkan ini
require_once __DIR__ . '/../controllers/Kegiatan.php';
require_once __DIR__ . '/../controllers/JenisKegiatan.php';

$kegiatan = new Kegiatan($pdo);
$jenisKegiatan = new JenisKegiatan($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'tanggal_mulai' => $_POST['tanggal_mulai'],
        'tanggal_selesai' => $_POST['tanggal_selesai'],
        'tempat' => $_POST['tempat'],
        'deskripsi' => $_POST['deskripsi'],
        'jenis_kegiatan_id' => $_POST['jenis_kegiatan_id']
    ];

    if ($kegiatan->create($data)) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href='index.php?url=kegiatan';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data');</script>";
    }
}
?>

<div class="container">
    <h3>Tambah Kegiatan</h3>
    <form method="post">
        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Jenis Kegiatan</label>
            <select name="jenis_kegiatan_id" class="form-control" required>
                <?php foreach ($jenisKegiatan->index() as $jk): ?>
                    <option value="<?= $jk['id'] ?>"><?= $jk['nama'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php?url=kegiatan" class="btn btn-secondary">Kembali</a>
    </form>
</div>
