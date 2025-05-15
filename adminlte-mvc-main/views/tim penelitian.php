<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../controllers/TimPenelitian.php';
$timPenelitian = new TimPenelitian($pdo);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dosen</th>
                            <th>Judul Penelitian</th>
                            <th>Peran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($timPenelitian->index() as $item): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['nama_dosen'] ?></td>
                            <td><?= $item['judul_penelitian'] ?></td>
                            <td><?= $item['peran'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
