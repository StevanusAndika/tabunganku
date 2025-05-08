<?php

class RiwayatSaldo
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function allByTabungan($tabungan_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM riwayat_saldo WHERE tabungan_id = ? ORDER BY created_at DESC");
        $stmt->execute([$tabungan_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM riwayat_saldo WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO riwayat_saldo (tabungan_id, nominal_saldo, keterangan, created_at) VALUES (?, ?, ?, NOW())");
        return $stmt->execute([
            $data['tabungan_id'],
            $data['nominal_saldo'],
            $data['keterangan']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE riwayat_saldo SET nominal_saldo = ?, keterangan = ? WHERE id = ?");
        return $stmt->execute([
            $data['nominal_saldo'],
            $data['keterangan'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM riwayat_saldo WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function totalSaldoByTabungan($tabungan_id)
    {
        $stmt = $this->conn->prepare("SELECT SUM(nominal_saldo) as total_saldo FROM riwayat_saldo WHERE tabungan_id = ?");
        $stmt->execute([$tabungan_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_saldo'] ?? 0;
    }
}
