<?php
require_once 'controllers/Penelitian.php';

$penelitian = new Penelitian($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($penelitian->delete($id)) {
        echo "<script>alert('Data penelitian berhasil dihapus'); window.location.href='index.php?url=penelitian';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data penelitian'); window.location.href='index.php?url=penelitian';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?url=penelitian';</script>";
}
