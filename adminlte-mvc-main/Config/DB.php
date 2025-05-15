<?php

use Config\Konek;

require_once __DIR__ . '/../config/connection.php';

// Gunakan koneksi dari Konek yang ambil dari .env
$pdo = Konek::make();

/**
 * File ini akan digunakan untuk memanggil database
 */
// $host = "localhost";
// $dbname = "nama_database";
// $username = "username";
// $password = "password";

// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
//     ]);
// } catch (PDOException $e) {
//     die("Koneksi gagal: " . $e->getMessage());
// }
