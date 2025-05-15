<?php
require_once 'controllers/Dosen.php';

$dosen = new Dosen($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($dosen->delete($id)) {
        echo "<script>alert('Data dosen berhasil dihapus'); window.location.href='index.php?url=dosen';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data dosen'); window.location.href='index.php?url=dosen';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?url=dosen';</script>";
}
