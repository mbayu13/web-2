<?php
require_once 'Config/DB.php';

class TimPenelitian
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $sql = "SELECT tp.peran, d.nama AS nama_dosen, p.judul AS judul_penelitian
                FROM tim_penelitian tp
                JOIN dosen d ON tp.dosen_id = d.nidn
                JOIN penelitian p ON tp.penelitian_id = p.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($id)
    {
        // Untuk detail (jika perlu)
    }

    public function create($data)
    {
        // Untuk tambah data
    }

    public function update($id, $data)
    {
        // Untuk update data
    }

    public function delete($id)
    {
        // Untuk hapus data
    }
}

$timPenelitian = new TimPenelitian($pdo);
