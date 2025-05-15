<?php
require_once 'controllers/JenisKegiatan.php';
$jenisKegiatan = new JenisKegiatan($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($jenisKegiatan->delete($id)) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='index.php?url=jenis kegiatan';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data'); window.location.href='index.php?url=jenis kegiatan';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?url=jenis kegiatan';</script>";
}
