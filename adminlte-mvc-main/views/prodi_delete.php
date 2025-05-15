<?php
require_once 'controllers/Prodi.php';

$prodi = new Prodi($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($prodi->delete($id)) {
        echo "<script>alert('Data prodi berhasil dihapus'); window.location.href='index.php?url=prodi';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data prodi'); window.location.href='index.php?url=prodi';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?url=prodi';</script>";
}
