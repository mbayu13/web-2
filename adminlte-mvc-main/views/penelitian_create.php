<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../controllers/Penelitian.php';
require_once __DIR__ . '/../controllers/BidangIlmu.php';

$penelitian = new Penelitian($pdo);
$bidangIlmu = new BidangIlmu($pdo);

// Proses simpan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'judul' => $_POST['judul'],
        'mulai' => $_POST['mulai'],
        'akhir' => $_POST['akhir'],
        'tahun_ajaran' => $_POST['tahun_ajaran'],
        'bidang_ilmu_id' => $_POST['bidang_ilmu_id']
    ];

    // try {
    //     $penelitian->create($data);
    //     echo "<script>alert('Data berhasil ditambahkan'); window.location.href='index.php?url=penelitian';</script>";
    // } catch (PDOException $e) {
    //     echo "<script>alert('Gagal menambahkan data: " . $e->getMessage() . "');</script>";
    // }

    if ($penelitian->create($data)) {
        echo "<script>alert('Data penelitian berhasil disimpan'); window.location.href='index.php?url=penelitian';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data penelitian');</script>";
    }
}
?>

<div class="container">
    <h3>Tambah Data Penelitian</h3>
    <form method="POST">
        <div class="form-group mb-2">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Mulai</label>
            <input type="date" name="mulai" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Akhir</label>
            <input type="date" name="akhir" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Tahun Ajaran</label>
            <input type="text" name="tahun_ajaran" class="form-control" placeholder="Contoh: 2024/2025" required>
        </div>
        <div class="form-group mb-3">
            <label>Bidang Ilmu</label>
            <select name="bidang_ilmu_id" class="form-control" required>
                <option value="">-- Pilih Bidang Ilmu --</option>
                <?php foreach ($bidangIlmu->index() as $b): ?>
                    <option value="<?= $b['id'] ?>"><?= $b['nama'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php?url=penelitian" class="btn btn-secondary">Kembali</a>
    </form>
</div>
