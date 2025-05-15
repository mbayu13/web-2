<?php
require_once 'Config/DB.php';

class Prodi
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Ambil semua data
    public function index()
    {
        $sql = "SELECT id, kode, nama, alamat, telpon, ketua FROM prodi";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil 1 data berdasarkan ID (untuk edit)
    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM prodi WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah data baru
    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO prodi (kode, nama, alamat, telpon, ketua) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['kode'],
            $data['nama'],
            $data['alamat'],
            $data['telpon'],
            $data['ketua']
        ]);
    }


    // Update data
    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE prodi SET kode = ?, nama = ?, alamat = ?, telpon = ?, ketua = ? WHERE id = ?");
        return $stmt->execute([
            $data['kode'],
            $data['nama'],
            $data['alamat'],
            $data['telpon'],
            $data['ketua'],
            $id
        ]);
    }

    // Hapus data
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM prodi WHERE id = ?");
        $stmt->execute([$id]);
    }
}

$prodi = new Prodi($pdo);
