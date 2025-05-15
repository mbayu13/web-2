<?php
require_once 'controllers/BidangIlmu.php';
$bidangIlmu = new BidangIlmu($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($bidangIlmu->delete($id)) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='index.php?url=bidang ilmu';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data'); window.location.href='index.php?url=bidang ilmu';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?url=bidang ilmu';</script>";
}
