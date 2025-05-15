<?php
require_once 'controllers/Prodi.php';
require_once 'controllers/Dosen.php';

$prodi = new Prodi($pdo);
$dosen = new Dosen($pdo);

// Proses simpan data saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nidn' => $_POST['nidn'],
        'nama' => $_POST['nama'],
        'gelar_belakang' => $_POST['gelar_belakang'],
        'gelar_depan' => $_POST['gelar_depan'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'tempat_lahir' => $_POST['tempat_lahir'],
        'tanggal_lahir' => $_POST['tanggal_lahir'],
        'alamat' => $_POST['alamat'],
        'email' => $_POST['email'],
        'tahun_masuk' => $_POST['tahun_masuk'],
        'prodi_id' => $_POST['prodi_id']
    ];

    if ($dosen->create($data)) {
        echo "<script>alert('Data dosen berhasil disimpan'); window.location.href='index.php?url=dosen';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data dosen');</script>";
    }
}
?>

<div class="container">
    <h3>Tambah Data Dosen</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label>NIDN</label>
            <input type="text" name="nidn" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Gelar Belakang</label>
            <input type="text" name="gelar_belakang" class="form-control">
        </div>
        <div class="form-group">
            <label>Gelar Depan</label>
            <input type="text" name="gelar_depan" class="form-control">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Tahun Masuk</label>
            <input type="number" name="tahun_masuk" class="form-control">
        </div>
        <div class="form-group">
            <label>Prodi</label>
            <select name="prodi_id" class="form-control">
                <?php foreach ($prodi->index() as $item): ?>
                    <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="index.php?url=dosen" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
