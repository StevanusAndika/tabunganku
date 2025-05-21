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

        $nama = trim($_POST['nama_kategori'] ?? '');
        $deskripsi = trim($_POST['deskripsi'] ?? '');

        if (empty($nama) || empty($deskripsi)) {
            echo json_encode(['error' => 'Nama dan deskripsi wajib diisi.']);
            return;
        }

        $model = new Kategori($conn);
        $existing = $model->findByName($nama);
        if ($existing) {
            echo json_encode(['error' => 'Nama kategori sudah digunakan.']);
            return;
        }

        $result = $model->create([
            'nama_kategori' => $nama,
            'deskripsi' => $deskripsi
        ]);

        echo json_encode($result ? ['success' => 'Kategori ditambahkan.'] : ['error' => 'Gagal menambahkan kategori.']);
    }

    public function update()
    {
        global $conn;
        if (!is_logged_in()) redirect('login');

        $id = $_POST['id'] ?? null;
        $nama = trim($_POST['nama'] ?? '');
        $deskripsi = trim($_POST['deskripsi'] ?? '');

        if (!$id || empty($nama) || empty($deskripsi)) {
            echo json_encode(['error' => 'ID, nama, dan deskripsi wajib diisi.']);
            return;
        }

        $model = new Kategori($conn);

        // Cek apakah nama kategori sudah digunakan oleh kategori lain
        $existing = $model->findByName($nama);
        if ($existing && $existing['id'] != $id) {
            echo json_encode(['error' => 'Nama kategori sudah digunakan oleh kategori lain.']);
            return;
        }

        $result = $model->update($id, [
            'nama_kategori' => $nama,
            'deskripsi' => $deskripsi
        ]);

        echo json_encode($result ? ['success' => 'Kategori diperbarui.'] : ['error' => 'Gagal memperbarui kategori.']);
    }

    public function delete()
    {
        global $conn;
        if (!is_logged_in()) redirect('login');

        $id = $_POST['id'] ?? null;

        if (!$id) {
            echo json_encode(['error' => 'ID kategori tidak valid.']);
            return;
        }

        $model = new Kategori($conn);
        $result = $model->delete($id);

        echo json_encode($result ? ['success' => 'Kategori dihapus.'] : ['error' => 'Gagal menghapus kategori.']);
    }

    public function detail()
    {
        global $conn;
        if (!is_logged_in()) redirect('login');

        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo json_encode(['error' => 'ID tidak ditemukan.']);
            return;
        }

        $model = new Kategori($conn);
        $kategori = $model->find($id);

        if (!$kategori) {
            echo json_encode(['error' => 'Data kategori tidak ditemukan.']);
            return;
        }

        echo json_encode($kategori);
    }
}
