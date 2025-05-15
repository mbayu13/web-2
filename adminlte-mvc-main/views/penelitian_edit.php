<?php
require_once 'controllers/Penelitian.php';
require_once 'controllers/BidangIlmu.php';

$penelitian = new Penelitian($pdo);
$bidangIlmu = new BidangIlmu($pdo);

$id = $_GET['id'];
$data = $penelitian->show($id);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan'); window.location.href='index.php?url=penelitian';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updated = [
        'judul' => $_POST['judul'],
        'mulai' => $_POST['mulai'],
        'akhir' => $_POST['akhir'],
        'tahun_ajaran' => $_POST['tahun_ajaran'],
        'bidang_ilmu_id' => $_POST['bidang_ilmu_id']
    ];

    if ($penelitian->update($id, $updated)) {
            echo "<script>alert('Data berhasil diupdate'); window.location.href='index.php?url=penelitian';</script>";
        } else {
            echo "<script>alert('Data gagal diupdate');</script>";
        }
 
    $penelitian->update($id, $updated);
    echo "<script>alert('Data berhasil diupdate'); window.location.href='index.php?url=penelitian';</script>";
}
?>

<div class="container">
    <h3>Edit Penelitian</h3>
    <form method="POST">
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>" required>
        </div>
        <div class="form-group">
            <label>Mulai</label>
            <input type="date" name="mulai" class="form-control" value="<?= $data['mulai'] ?>" required>
        </div>
        <div class="form-group">
            <label>Akhir</label>
            <input type="date" name="akhir" class="form-control" value="<?= $data['akhir'] ?>" required>
        </div>
        <div class="form-group">
            <label>Tahun Ajaran</label>
            <input type="text" name="tahun_ajaran" class="form-control" value="<?= $data['tahun_ajaran'] ?>" required>
        </div>
        <div class="form-group">
            <label>Bidang Ilmu</label>
            <select name="bidang_ilmu_id" class="form-control">
                <?php foreach ($bidangIlmu->index() as $b): ?>
                    <option value="<?= $b['id'] ?>" <?= $data['bidang_ilmu_id'] == $b['id'] ? 'selected' : '' ?>>
                        <?= $b['nama'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="index.php?url=penelitian" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
