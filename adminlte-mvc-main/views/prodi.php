<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../controllers/Prodi.php';
$prodi = new Prodi($pdo);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?url=prodi_create" class="btn btn-primary mb-3">Tambah Prodi</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Prodi</th>
                            <th>Alamat</th>
                            <th>Telpon</th>
                            <th>Ketua</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($prodi->index() as $item): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['kode'] ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['alamat'] ?></td>
                            <td><?= $item['telpon'] ?></td>
                            <td><?= $item['ketua'] ?></td>
                            <td>
                                <a href="index.php?url=prodi_edit&id=<?= $item['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="index.php?url=prodi_delete&id=<?= $item['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
