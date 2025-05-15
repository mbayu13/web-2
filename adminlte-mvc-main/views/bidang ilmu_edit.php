<?php
require_once 'controllers/BidangIlmu.php';
$bidangIlmu = new BidangIlmu($pdo);

$id = $_GET['id'];
$data = $bidangIlmu->show($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($bidangIlmu->update($id, $_POST)) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='index.php?url=bidang ilmu';</script>";
    } else {
        echo "<script>alert('Gagal update data');</script>";
    }
}
?>

<div class="container">
    <h3>Edit Bidang Ilmu</h3>
    <form method="POST">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required><?= $data['deskripsi'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="index.php?url=bidang ilmu" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
