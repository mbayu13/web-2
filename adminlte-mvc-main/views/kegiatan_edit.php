<?php
require_once 'controllers/Kegiatan.php';
require_once 'controllers/JenisKegiatan.php';

$kegiatan = new Kegiatan($pdo);
$jenisKegiatan = new JenisKegiatan($pdo);

$data = $kegiatan->show($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updateData = [
        'tanggal_mulai' => $_POST['tanggal_mulai'],
        'tanggal_selesai' => $_POST['tanggal_selesai'],
        'tempat' => $_POST['tempat'],
        'deskripsi' => $_POST['deskripsi'],
        'jenis_kegiatan_id' => $_POST['jenis_kegiatan_id']
    ];

    if ($kegiatan->update($_GET['id'], $updateData)) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='index.php?url=kegiatan';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data');</script>";
    }
}
?>

<div class="container">
    <h3>Edit Kegiatan</h3>
    <form method="post">
        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" value="<?= $data['tanggal_mulai'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" value="<?= $data['tanggal_selesai'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tempat</label>
            <input type="text" name="tempat" value="<?= $data['tempat'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"><?= $data['deskripsi'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Jenis Kegiatan</label>
            <select name="jenis_kegiatan_id" class="form-control">
                <?php foreach ($jenisKegiatan->index() as $jk): ?>
                    <option value="<?= $jk['id'] ?>" <?= $data['jenis_kegiatan_id'] == $jk['id'] ? 'selected' : '' ?>>
                        <?= $jk['nama'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="index.php?url=kegiatan" class="btn btn-secondary">Kembali</a>
    </form>
</div>
