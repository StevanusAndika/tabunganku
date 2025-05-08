<?php

class Tabungan
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function allByUser($user_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM tabungan WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM tabungan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO tabungan 
                (nama_tabungan, jumlah_tabungan, rencana_pengisian, nominal_pengisian, tanggal_dibuat, kategori_id, user_id, id_mata_uang, perkiraan_berakhir, status_tabungan, foto_tabungan, path_foto, created_at) 
                VALUES (?, ?, ?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?, NOW())";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['nama_tabungan'],
            $data['jumlah_tabungan'],
            $data['rencana_pengisian'],
            $data['nominal_pengisian'],
            $data['kategori_id'],
            $data['user_id'],
            $data['id_mata_uang'],
            $data['perkiraan_berakhir'],
            $data['status_tabungan'],
            $data['foto_tabungan'],
            $data['path_foto']
        ]);
    }

    public function updateProgress($id, $saldo_terkumpul)
    {
        // ambil total yang harus dicapai
        $tabungan = $this->find($id);
        if (!$tabungan) return false;

        $total = $tabungan['jumlah_tabungan'];
        $persen = min(100, ($saldo_terkumpul / $total) * 100);

        $stmt = $this->conn->prepare("UPDATE tabungan SET persentase_tercapai = ? WHERE id = ?");
        return $stmt->execute([$persen, $id]);
    }
}
