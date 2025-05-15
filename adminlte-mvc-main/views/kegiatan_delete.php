<?php
require_once 'controllers/Kegiatan.php';
$kegiatan = new Kegiatan($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($kegiatan->delete($id)) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='index.php?url=kegiatan';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data'); window.location.href='index.php?url=kegiatan';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?url=kegiatan';</script>";
}
