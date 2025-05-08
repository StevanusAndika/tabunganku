<?php

class User
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
{
    // Cek apakah semua field yang dibutuhkan sudah terisi
    $isComplete = !empty($data['username']) && !empty($data['email']) && !empty($data['no_telpon']) && !empty($data['alamat']);

    $sql = "UPDATE users SET username = ?, email = ?, no_telpon = ?, alamat = ?, updated_at = NOW()";

    $params = [
        $data['username'],
        $data['email'],
        $data['no_telpon'],
        $data['alamat']
    ];

    if (isset($data['password'])) {
        $sql .= ", password = ?";
        $params[] = $data['password'];
    }

    if (isset($data['photo'])) {
        $sql .= ", profil_foto = ?, path_photo = ?";
        $params[] = $data['photo'];
        $params[] = 'public/assets/uploads/' . $data['photo'];
    }

    // Update biodata_status jika data lengkap
    if ($isComplete) {
        $sql .= ", biodata_status = 'lengkap'";
    }

    $sql .= " WHERE id = ?";
    $params[] = $id;

    $stmt = $this->conn->prepare($sql);
    return $stmt->execute($params);
}


   
}
