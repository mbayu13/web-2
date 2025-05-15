<?php
require_once __DIR__ . '/../config/DB.php';

class BidangIlmu
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM bidang_ilmu");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM bidang_ilmu WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO bidang_ilmu (nama, deskripsi) VALUES (?, ?)");
        return $stmt->execute([$data['nama'], $data['deskripsi']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE bidang_ilmu SET nama = ?, deskripsi = ? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['deskripsi'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM bidang_ilmu WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
