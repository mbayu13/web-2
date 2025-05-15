<?php
require_once __DIR__ . '/../config/DB.php';

class Penelitian
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Ambil semua data penelitian (join dengan bidang_ilmu)
    public function index()
    {
        $sql = "SELECT p.*, b.nama AS nama_bidang_ilmu 
                FROM penelitian p 
                LEFT JOIN bidang_ilmu b ON p.bidang_ilmu_id = b.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil satu data berdasarkan id
    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM penelitian WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Simpan data penelitian
    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO penelitian (judul, mulai, akhir, tahun_ajaran, bidang_ilmu_id) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['judul'],
            $data['mulai'],
            $data['akhir'],
            $data['tahun_ajaran'],
            $data['bidang_ilmu_id']
        ]);
    }

    // Update data penelitian
    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE penelitian SET judul = ?, mulai = ?, akhir = ?, tahun_ajaran = ?, bidang_ilmu_id = ? WHERE id = ?");
        return $stmt->execute([
            $data['judul'],
            $data['mulai'],
            $data['akhir'],
            $data['tahun_ajaran'],
            $data['bidang_ilmu_id'],
            $id
        ]);
    }

    // Hapus data penelitian
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM penelitian WHERE id = ?");
        return $stmt->execute([$id]);
    }

}
