<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../controllers/Kegiatan.php';
$kegiatan = new Kegiatan($pdo);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?url=kegiatan_create" class="btn btn-primary mb-3">Tambah Kegiatan</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Tempat</th>
                            <th>Deskripsi</th>
                            <th>Jenis Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($kegiatan->index() as $item): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['tanggal_mulai'] ?></td>
                            <td><?= $item['tanggal_selesai'] ?></td>
                            <td><?= $item['tempat'] ?></td>
                            <td><?= $item['deskripsi'] ?></td>
                            <td><?= $item['nama_jenis_kegiatan'] ?></td>
                            <td>
                                <a href="index.php?url=kegiatan_edit&id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?url=kegiatan_delete&id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
