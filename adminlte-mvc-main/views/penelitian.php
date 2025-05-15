<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../controllers/Penelitian.php';
$penelitian = new Penelitian($pdo);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?url=penelitian_create" class="btn btn-primary mb-3">Tambah Penelitian</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Mulai</th>
                            <th>Akhir</th>
                            <th>Tahun Ajaran</th>
                            <th>Bidang Ilmu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($penelitian->index() as $item): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['judul'] ?></td>
                            <td><?= $item['mulai'] ?></td>
                            <td><?= $item['akhir'] ?></td>
                            <td><?= $item['tahun_ajaran'] ?></td>
                            <td><?= $item['nama_bidang_ilmu'] ?></td>
                            <td>
                                <a href="index.php?url=penelitian_edit&id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?url=penelitian_delete&id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
