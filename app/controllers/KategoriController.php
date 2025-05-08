<?php
require_once __DIR__ . '/../models/Kategori.php';
class KategoriController
{
    public function index()
    {
        global $conn;
        if (!is_logged_in()) redirect('login');

        $model = new Kategori($conn);
        $kategori = $model->all();

        include __DIR__ . '/../views/kategori/index.php';
    }

    public function add()
    {
        global $conn;
        if (!is_logged_in()) redirect('login');

        $model = new Kategori($conn);
        $data = [
            'nama_kategori' => $_POST['nama'],
            'deskripsi' => $_POST['deskripsi']
        ];

        $result = $model->create($data);

        if ($result) {
            echo json_encode(['success' => 'Kategori ditambahkan.']);
        } else {
            echo json_encode(['error' => 'Gagal menambahkan kategori.']);
        }
    }

    public function update()
    {
        global $conn;
        $model = new Kategori($conn);
        $id = $_POST['id'];
        $data = [
            'nama_kategori' => $_POST['nama'],
            'deskripsi' => $_POST['deskripsi']
        ];

        $result = $model->update($id, $data);

        if ($result) {
            echo json_encode(['success' => 'Kategori diperbarui.']);
        } else {
            echo json_encode(['error' => 'Gagal memperbarui kategori.']);
        }
    }

    public function delete()
    {
        global $conn;
        $model = new Kategori($conn);
        $id = $_POST['id'];

        $result = $model->delete($id);

        if ($result) {
            echo json_encode(['success' => 'Kategori dihapus.']);
        } else {
            echo json_encode(['error' => 'Gagal menghapus kategori.']);
        }
    }

    public function detail()
    {
        global $conn;
        $model = new Kategori($conn);
        $id = $_GET['id'];
        $kategori = $model->find($id);
        // Pastikan field 'created_at' termasuk dalam data yang dikirim
        echo json_encode($kategori);
    }
    
}
