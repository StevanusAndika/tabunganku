<?php

class MataUang
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function all()
    {
        $stmt = $this->conn->query("SELECT * FROM mata_uang ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM mata_uang WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByName($nama)
    {
        $stmt = $this->conn->prepare("SELECT * FROM mata_uang WHERE nama_mata_uang = ?");
        $stmt->execute([$nama]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO mata_uang (nama_mata_uang, keterangan, created_at) VALUES (?, ?, NOW())");
        return $stmt->execute([$data['nama_mata_uang'], $data['keterangan']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE mata_uang SET nama_mata_uang = ?, keterangan = ? WHERE id = ?");
        return $stmt->execute([$data['nama_mata_uang'], $data['keterangan'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM mata_uang WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
