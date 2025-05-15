<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../controllers/BidangIlmu.php';
$bidangIlmu = new BidangIlmu($pdo);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?url=bidang ilmu_create" class="btn btn-primary mb-3">Tambah Bidang Ilmu</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($bidangIlmu->index() as $item):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['deskripsi'] ?></td>
                            <td>
                                <a href="index.php?url=bidang ilmu_edit&id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?url=bidang ilmu_delete&id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
