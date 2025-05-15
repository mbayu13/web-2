<?php
class Kegiatan {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $sql = "SELECT k.*, jk.nama AS nama_jenis_kegiatan 
                FROM kegiatan k 
                JOIN jenis_kegiatan jk ON jk.id = k.jenis_kegiatan_id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM kegiatan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO kegiatan (tanggal_mulai, tanggal_selesai, tempat, deskripsi, jenis_kegiatan_id) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['tanggal_mulai'],
            $data['tanggal_selesai'],
            $data['tempat'],
            $data['deskripsi'],
            $data['jenis_kegiatan_id']
        ]);
    }

    public function update($id, $data) {
        $sql = "UPDATE kegiatan SET tanggal_mulai = ?, tanggal_selesai = ?, tempat = ?, deskripsi = ?, jenis_kegiatan_id = ? 
                WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['tanggal_mulai'],
            $data['tanggal_selesai'],
            $data['tempat'],
            $data['deskripsi'],
            $data['jenis_kegiatan_id'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM kegiatan WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
