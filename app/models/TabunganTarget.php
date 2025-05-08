<?php

class TabunganTarget
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function allByUser($user_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM kalkulator_target WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM kalkulator_target WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO kalkulator_target 
            (user_id, nama_target, nominal_target, tanggal_dimulai, tanggal_berakhir, metode_menabung, hasil_kalkulasi, target_tercapai, durasi, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
        ");

        return $stmt->execute([
            $data['user_id'],
            $data['nama_target'],
            $data['nominal_target'],
            $data['tanggal_dimulai'],
            $data['tanggal_berakhir'],
            $data['metode_menabung'],
            $data['hasil_kalkulasi'],
            $data['target_tercapai'],
            $data['durasi']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("
            UPDATE kalkulator_target SET 
            nama_target = ?, nominal_target = ?, tanggal_dimulai = ?, 
            tanggal_berakhir = ?, metode_menabung = ?, hasil_kalkulasi = ?, target_tercapai = ?, durasi = ?
            WHERE id = ?
        ");

        return $stmt->execute([
            $data['nama_target'],
            $data['nominal_target'],
            $data['tanggal_dimulai'],
            $data['tanggal_berakhir'],
            $data['metode_menabung'],
            $data['hasil_kalkulasi'],
            $data['target_tercapai'],
            $data['durasi'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM kalkulator_target WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
