<?php

class Kategori
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function all()
    {
        $stmt = $this->conn->query("SELECT * FROM kategori ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM kategori WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByName($nama)
    {
        $stmt = $this->conn->prepare("SELECT * FROM kategori WHERE nama_kategori = ?");
        $stmt->execute([$nama]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO kategori (nama_kategori, deskripsi, created_at) VALUES (?, ?, NOW())");
        return $stmt->execute([$data['nama_kategori'], $data['deskripsi']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE kategori SET nama_kategori = ?, deskripsi = ? WHERE id = ?");
        return $stmt->execute([$data['nama_kategori'], $data['deskripsi'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM kategori WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
